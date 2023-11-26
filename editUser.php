<?php
$mysqli = require __DIR__ . "/scripts/database.php";
if(isset($_POST['click_edit_btn'])){
    $id = $_POST["user_id"];
    $arrayresult = [];
    $mysqli = require __DIR__ . "/scripts/database.php";
    $sql = "SELECT * FROM empleados WHERE empleado_id = $id";
    $result = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            array_push($arrayresult, $row);
        }
        header('content-type: application/json');
        echo json_encode($arrayresult); 
    }
    else{
        echo "no se encontro un registro";
    }
}

if(isset($_POST['editUserSubmit'])) {
    $editId = $_POST["editId"];
    $editName = filter_input(INPUT_POST, "editName", FILTER_SANITIZE_SPECIAL_CHARS);
    $editUsername = filter_input(INPUT_POST, "editUsername", FILTER_SANITIZE_SPECIAL_CHARS);
    $editPassword = filter_input(INPUT_POST, "editPassword", FILTER_SANITIZE_SPECIAL_CHARS);
    $editRol = $_POST["editRol"];
    $editState = $_POST["editState"];
    
    $sql2 = "UPDATE empleados SET nombre = '$editName', nombre_usuario = '$editUsername', password = '$editPassword', tipo_cuenta = '$editRol', estado = $editState WHERE empleado_id = $editId";
    $result2 = mysqli_query($mysqli, $sql2);
    if(!$result2){
        $queryFail = true;
    }
    else{
        $querySuccess = true;
    }
    header("Location: usuarios.php");
}