<?php
$queryFail = $querySuccess = false;
$id = $_GET["id"];
if(isset($id)){
    $mysqli = require __DIR__ . "/scripts/database.php";
    $sql = "SELECT * FROM empleados WHERE empleado_id = '$id'";
    $result = mysqli_query($mysqli, $sql);
    $user = $result -> fetch_assoc();

    $editName = $user["nombre"];
    $editUsername = $user["nombre_usuario"];
    $editPassword = $user["password"];
    $editRol = $user["tipo_cuenta"];

    if($_SERVER["REQUEST_METHOD"]  === "POST"){
        extract($_POST);
        $sql2 = "UPDATE empleados SET nombre = '$editName', nombre_usuario = '$editUsername', password = '$editPassword', tipo_cuenta = '$editRol' WHERE empleado_id = $id";
        $result = mysqli_query($mysqli, $sql2);
        if(!$result){
            $queryFail = true;
        }
        else{
            $querySuccess = true;
        }
    }
}
    else{
        header("Location: index.php");
        exit;
    }

