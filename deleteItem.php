<?php
$id = $_GET["id"];
if(isset($id)){ 
    $mysqli = require __DIR__ . "/scripts/database.php";
    $sql = "DELETE FROM inventario WHERE articulo_id = $id";
    $result = mysqli_query($mysqli, $sql);
    header("Location: inventario.php");
}
else{
    die("xddxd");
    header("Location: inventario.php");
}