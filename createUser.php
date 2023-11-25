<?php
$queryFail = $querySuccess = false;
$createUsername = $createName = $createPassword = $createRol = "";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        extract($_POST);
        $mysqli = require __DIR__ . "/scripts/database.php";
        $sql = "INSERT INTO empleados (nombre, nombre_usuario, password, tipo_cuenta, estado) VALUES('$createName', '$createUsername', '$createPassword', '$createRol', 1);";
        $result = mysqli_query($mysqli, $sql);
        header("Location: usuarios.php");
        if(!$result) {
             $queryFail = true;
             die("ERRORRRRR");
         }
         else{
             $querySuccess = true;
             $username = $name = $password = $rol = "";
             header("Location: usuarios.php");
         }
    }