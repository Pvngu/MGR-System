<?php
$queryFail = $querySuccess = false;
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        extract($_POST);
        $mysqli = require __DIR__ . "/scripts/database.php";
        $sql = "INSERT INTO articulo(articulo_codigo, descripcion) 
        VALUE('$addCode','$addDescription')";
        $sql2 = "INSERT INTO inventario(articulo_codigo, stock_inicial, stock_actual, categoria)
        VALUE('$addCode' ,$addInitialStock, $addActualStock, '$addCategory')";
        mysqli_query($mysqli, $sql);
        mysqli_query($mysqli, $sql2);
        header("Location: inventario.php");
        if(!$result) {
             $queryFail = true;
         }
         else{
             $querySuccess = true;
             header("Location: inventario.php");
         }
    }