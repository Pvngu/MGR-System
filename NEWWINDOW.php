<?php
session_start();
if(isset($_SESSION["empleado_id"])){
    require __Dir__ . "/scripts/database.php";

    $sql = "SELECT * FROM empleados WHERE empleado_id = {$_SESSION["empleado_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
else{
    header("Location: index.php");
}
if(!$user["estado"] == 1){
    session_destroy();
    setcookie("username", "", time() -3600);
    setcookie("password", "", time() -3600);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGR - Admin</title>
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php if($user["tipo_cuenta"] == "administrador"){ ?>
    <!---------------------------------------------- For admin ------------------------------------------------>
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
            <!---------------------THE CONTENT GOES HERE------------------------------>
        </div>
    </div>
<!---------------------------------------------- For inventory ------------------------------------------------>
    <?php } elseif($user["tipo_cuenta"] == "inventario") { ?>
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
            </div>
            <?php include("includes\sidebar-bottomItems.php") ?>
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
                    <?php include("includes\home-inventory.php");?>
                    <?php include("includes\home-settings.php"); ?>
                </div>
        </div>
    </div>
<!---------------------------------------------- For report ------------------------------------------------>
    <?php } elseif($user["tipo_cuenta"] == "reporte") { ?>
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
                        <i class='bx bxs-edit' ></i>
                        <span>Reportes</span>
                    </a>
                    <span class="tooltip">Reportes</span>
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
            <div class="welcome">
                <h1>Bienvenido al sistema de inventarios de MGR</h1>
                <h2>Menu principal</h2>
            </div>
            <div class="container">
                <?php include("includes\home-report.php");?>
                <?php include("includes\home-settings.php"); ?>
            </div>
        </div>
        <?php
            include("includes\sidebar_views.php");
        ?>
    </div>
    <?php } ?>

    <?php
        include("includes\sidebar_views.php");
    ?>
</body>
<script src="assets\css\sidebar.css"></script>
</html>