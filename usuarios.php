<?php
require("authentication.php");
if($user["tipo_cuenta"] !== "administrador"){
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGR - Usuarios</title>
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/usuarios.css">
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
                    <a href="home.php">
                        <i class='bx bx-home-alt-2'></i>
                        <span>Home</span>
                    </a>
                    <span class="tooltip">Home</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-table'></i>
                        <span>Inventario</span>
                    </a>
                    <span class="tooltip">Inventario</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bxs-edit' ></i>
                        <span>Reportes</span>
                    </a>
                    <span class="tooltip">Reportes</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bxs-user-account'></i>
                        <span>Usuarios</span>
                    </a>
                    <span class="tooltip">Usuarios</span>
                </li>
            </div>
            <?php include("includes\sidebar-bottomItems.php") ?>
        </ul>
    </div>
    <div class="home">
        <?php
        include("includes/header.php");
        ?>
        <div class="content">
            <!---------------------manage users------------------------------>
            <h1>Usuarios</h1>
            <button id = "addButton">Añadir usuario</button>
            <table class = "content-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Tipo de cuenta</th>
                        <th>Contraseña</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = require __DIR__ . "/scripts/database.php";

                    $sql = "SELECT * FROM empleados";
                    $result = $mysqli->query($sql);
                    if(!$result){
                        die("Invalid query: " . $mysqli->error);
                    }
                    
                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                        <td>$row[empleado_id]</td>
                        <td>$row[nombre_usuario]</td>
                        <td>$row[nombre]</td>
                        <td>$row[tipo_cuenta]</td>
                        <td>$row[password]</td>
                        <td>$row[estado]</td>
                        <td>
                            <a href='#'>
                                <i class='bx bxs-edit-alt'></i>
                            </a>
                            <a href='#'>
                                <i class='bx bx-trash'></i>
                            </a>
                        </td>
                    </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
        include("includes\sidebar_views.php");
    ?>
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
    const openButtonS = document.querySelectorAll(".openModalS")
    
    for(i = 0; i < openButtonS.length; i++){
        openButtonS[i].addEventListener("click", () => {
        modalS.showModal()
    })
    }
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
    var radios = document.getElementsByName('themes');
    var slider = document.querySelector('.slider');

    // Function to set a cookie with the selected theme
    function setThemeCookie(theme) {
    // Set expiration date to 3 months from the current date
    var expirationDate = new Date();
    expirationDate.setMonth(expirationDate.getMonth() + 3);

    document.cookie = "selected_theme=" + theme + "; expires=" + expirationDate.toUTCString() + "; path=/";
}

    // Function to get the value of a cookie
    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) return match[2];
    }

    // Function to update the slider position based on the selected theme
    function updateSliderPosition() {
        var savedTheme = getCookie('selected_theme');
        if (savedTheme === 'dark-theme') {
            slider.style.transform = 'translateX(100%)';
        } else {
            slider.style.transform = 'translateX(0)';
        }
    }

    // Check if a theme cookie exists and apply the theme
    var savedTheme = getCookie('selected_theme');
    if (savedTheme) {
        html[0].classList.add(savedTheme);
        updateSliderPosition();
    }

    // Add event listeners for theme changes
    for (var i = 0; i < radios.length; i++) {
        radios[i].addEventListener('change', function () {
            html[0].classList.remove(html[0].classList.item(0));
            html[0].classList.add(this.id);
            setThemeCookie(this.id);
            updateSliderPosition();
        });
    }
</script>
</html>