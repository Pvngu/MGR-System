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
// user status authentication
if(!$user["estado"] == 1){
    session_destroy();
    setcookie("username", "", time() -3600);
    setcookie("password", "", time() -3600);
    header("Location: index.php");
    exit;
}
?>