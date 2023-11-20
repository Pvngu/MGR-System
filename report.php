<?php
session_start();
if(isset($_SESSION["empleado_id"])){
    require __Dir__ . "/scripts/database.php";

    $sql = "SELECT * FROM empleados WHERE empleado_id = {$_SESSION["empleado_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGR - Inventario</title>
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="logoContent">
            <div class="logo">
                <span>MGR MAQUINADOS</span>
                <i class='bx bx-menu' id="btn"></i>
            </div>
        </div>
        <ul class="nameList">
            <div class="topItems">
                <div class="itemsHeader">Menu</div>
                <li>
                    <a href="report.php">
                        <i class='bx bx-home-alt-2'></i>
                        <span>Home</span>
                    </a>
                    <span class="tooltip">Home</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bxs-edit' ></i>
                        <span>Reportes</span>
                    </a>
                    <span class="tooltip">Reportes</span>
                </li>
            </div>
            <div class="bottomItems">
                <div class="itemsHeader">preferencias</div>
                <li>
                    <a class="openModalS">
                        <i class='bx bx-cog'></i>
                        <span>Configuracion</span>
                    </a>
                    <span class="tooltip">Configuracion</span>
                </li>
                <li>
                    <a class="openModalL">
                        <i class='bx bx-log-out-circle'></i>
                        <span>Cerrar sesion</span>
                    </a>
                    <span class="tooltip">Cerrar sesion</span>
                </li>
            </div>
        </ul>
    </div>
    <div class="home">
        <?php
            include("includes/header.php");
        ?>
        <div class="content">
            <div class="welcome">
                <h1>Bienvenido al sistema de inventarios de MGR</h1>
                <h2>Menu principal</h2>
            </div>
            <div class="container">
                    <a class="item-container" href="#">
                        <img src="assets/images/Report.png" alt="icon image">
                        <h2>Realizar reportes</h2>
                        <p>Ofrece datos esenciales para generar informes detallados sobre el inventario, optimizando la toma de decisiones.</p>
                    </a>
                    <a class="item-container" href="#">
                        <img src="assets/images/settings-icon.png" alt="icon image">
                        <h2>Configuracion</h2>
                        <p>Acceso a las configuraciones de la página, incluyendo aspecto, tamaño de letra e informacion adicional.</p>
                    </a>
                </div>
        </div>
        <?php
            include("includes\sidebar_views.php");
        ?>
    </div>
</body>
<script>
    //// sidebar button
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    btn.onclick = function() {
        sidebar.classList.toggle("active");
    }

    //// popup window
    // settings window
    const closeButtonS = document.querySelector(".closeBtnModalS")
    const modalS = document.querySelector(".settingsModal")
    const openButtonS = document.querySelector(".openModalS")
    openButtonS.addEventListener("click", () => {
        modalS.showModal()
    })
    closeButtonS.addEventListener("click", () => {
        modalS.close();
    })
    // logout window
    const closeButtonL = document.querySelectorAll(".closeBtnModalL");
    const modalL = document.querySelector(".logoutModal")
    const openButtonL = document.querySelector(".openModalL")
    openButtonL.addEventListener("click", () => {
        modalL.showModal()
    })

    for(i = 0; i < closeButtonL.length; i++){
        closeButtonL[i].addEventListener("click", () => {
        modalL.close();
    })
    }
    //About us window
    const closeButtonAU = document.querySelector(".closeBtnModalAU")
    const modalAU = document.querySelector(".aboutUsModal");
    const openButtonAU = document.querySelector(".openModalAU");
    openButtonAU.addEventListener("click", () => {
        modalAU.showModal()
    })

    closeButtonAU.addEventListener("click", () => {
        modalAU.close();
    })
        //Account settings window
        const closeButtonAS = document.querySelector(".closeBtnModalAS")
        const modalAS = document.querySelector(".accountStgModal");
        const openButtonAS = document.querySelector(".openModalAS");
        openButtonAS.addEventListener("click", () => {
        modalAS.showModal()
    })

    closeButtonAS.addEventListener("click", () => {
        modalAS.close();
    })

    ////Theme switcher slider
    var html = document.getElementsByTagName('html');
    var radios = document.getElementsByName('themes')

    for (i = 0; i < radios.length; i++){
        radios[i].addEventListener('change', function() {
            html[0].classList.remove(html[0].classList.item(0));
            html[0].classList.add(this.id);
        });
    }
</script>
</html>