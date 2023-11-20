<?php
session_start();
if(isset($_SESSION["empleado_id"])){
    require __Dir__ . "/scripts/database.php";

    $sql = "SELECT * FROM empleados WHERE empleado_id = {$_SESSION["empleado_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
?>