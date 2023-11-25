<?php
$queryFail = $querySuccess = false;
$id = $_GET["id"];
if(isset($id)){ 
    $mysqli = require __DIR__ . "/scripts/database.php";
    $sql = "DELETE FROM empleados WHERE empleado_id = $id";
    $result = mysqli_query($mysqli, $sql);
    header("Location: usuarios.php");
}
else{
    header("Location: usuarios.php");
}