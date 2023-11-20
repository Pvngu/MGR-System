<?php
$host = "localhost";
$dbname = "mgr_maquinados_db";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

//if there's a connection error it will display a message along with the error message
if($mysqli->connect_errno){
    die("connection error: " . $mysqli->connect_error);
}
return $mysqli;
?>