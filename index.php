<?php
$is_invalid = false;

  if($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__ . "/scripts/database.php";
    $sql = sprintf("SELECT * FROM empleados WHERE nombre_usuario = '%s'", $mysqli -> real_escape_string($_POST["username"]));
    $result = $mysqli->query($sql);
    //return the record if one was found as an associative array
    $user = $result->fetch_assoc();

    if($user){
      if(password_verify($_POST["password"], $user["password"])){
        session_start();
        session_regenerate_id();
        $_SESSION["empleado_id"] = $user["empleado_id"];
        switch($user["tipo_cuenta"]){
          case "administrador":
            header("Location: admin.php");
          break;
          case "inventario":
            header("Location: inventory.php");
          break;
          case "reporte":
            header("Location: report.php");
          break;
        }
        exit;
      }
    }
    $is_invalid = true;
  }
?>
<!DOCTYPE html>
<html lang="esp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/images/mgr-logo.png">
  <link rel="stylesheet" href="assets/css/login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- google font -->
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">

  <title>Inicio de sesion en MGR</title>
</head>
<body>
  <div class="container">
    <div class="information">
      <h1>MGR MAQUINADOS</h1>
      <span>Sistema de prueba</span>
      <span id="bottomText">Elaborado por un grupo de estudiantes del Tecnologico de Tijuana.</span>
    </div>
    <div class="login-form">
      <form action="index.php" method="post">
        <h1 class="loginText">Inicio de sesion <br>del personal</h1>
        <?php if($is_invalid): ?>
          <em style = "color: red;">La cuenta no ha sido encontrada</em>
        <?php endif; ?>
        <div class="input-box">
          <input type="text" name="username" placeholder="Nombre de usuario">
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Contraseña">
        </div>
        <input type="submit" name="login" value="Iniciar sesion">
        <div class="forgot open-button">Olvido la contraseña?</div>
      </form>
      <dialog class="modal" id="modal">
        <i class='bx bx-x close-button modalX'></i>
        <h1>Olvido su contraseña?</h1>
        <p>Si necesita recuperar la contraseña de su cuenta, por favor póngase en contacto con uno de sus supervisores y proporcione su dirección de correo electrónico o su nombre completo. De esta manera, se le brindara asistencia para recuperar su contraseña.</p>
      </dialog>
    </div>
  </div>
  <script>
    const modal = document.querySelector("#modal");
    const openModal = document.querySelector(".open-button");
    const closeModal = document.querySelector(".close-button");

    openModal.addEventListener("click", () => {
    modal.showModal();
    });

    closeModal.addEventListener("click", () => {
    modal.close();
    });
</script>
</body>
</html>