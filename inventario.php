<?php
require("authentication.php");
if($user["tipo_cuenta"] !== "inventario" && $user["tipo_cuenta"] !== "administrador"){
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGR - Usuarios</title>
    <link rel="stylesheet" href="assets/css/usuarios.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/sidebar.css?<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="sidebar">
        <div class="logoContent">
            <div class="logo">
                <span>MGR MAQUINADOS</span>
                <i class='bx bx-menu' id="btn"></i>
            </div>
        </div>
        <ul class="nameList">
            <div class="topItems">
            <?php if($user["tipo_cuenta"] == "administrador") { ?>
                <div class="itemsHeader">Menu</div>
                    <?php include("includes/sidebar-admin.php"); ?>
                </div>

            <?php } elseif($user["tipo_cuenta"] == "inventario") { ?>
                <div class="itemsHeader">Menu</div>
                    <?php include("includes/sidebar-inventory.php"); ?>
                </div>
            <?php } include("includes/sidebar-bottomItems.php") ?>
        </ul>
    </div>
    <div class="home">
        <?php
        include("includes/header.php");
        ?>
        <div class="content">
            <!---------------------Inventory table------------------------------>
            <div class="content-header">
                <h1>Inventario</h1>
                <button id = "addButton" class="openModalCU">Agregar</button>
            </div>
            <div class = "table-container">
            <table class = "content-table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th class = 'center-cell'>Stock Inicial</th>
                        <th class = 'center-cell'>Stock Actual</th>
                        <th class = 'center-cell'>Categoria</th>
                        <th class = 'center-cell'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = require __DIR__ . "/scripts/database.php";

                    $sql = "SELECT inventario.articulo_id, articulo.articulo_codigo, articulo.descripcion, inventario.stock_inicial, inventario.stock_actual, inventario.categoria 
                    FROM inventario 
                    INNER JOIN articulo
                    ON inventario.articulo_codigo = articulo.articulo_codigo";
                    $result = $mysqli->query($sql);
                    if(!$result){
                        die("Invalid query: " . $mysqli->error);
                    }
                    
                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                            <td>$row[articulo_id]</td>
                            <td>$row[articulo_codigo]</td>
                            <td>$row[descripcion]</td>
                            <td class = 'center-cell'>$row[stock_inicial]</td>
                            <td class = 'center-cell'>$row[stock_actual]</td>
                            <td class = 'center-cell'>$row[categoria]</td>
                            <td class = 'actions center-cell'>
                                <a class = '#'>
                                    <i class='bx bxs-edit-alt' style = 'color: #2a8c3f'></i>
                                </a>
                                <a href='deleteItem.php?id=$row[articulo_id]'>
                                    <i class='bx bx-trash' style = 'color: #fa7878'></i>
                                </a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
            </div>
            <!-- Add new product -->
        <dialog class="createUserModal modal">
            <div class="modalHeader">
                <h1>Agregar producto</h1>
                <i class='bx bx-x closeBtnModalCU modalX'></i>
            </div>
            <div class="modalContent CUModal">
                <form method="post" action="addItem.php">
                    <div class = "input-boxes">
                        <div class="box-item">
                            <label>Codigo</label><br>
                            <input name="addCode" type="text">
                        </div>
                        <div class="box-item">
                            <label>Descripcion</label><br>
                            <input name="addDescription" type="text">
                        </div>
                        <div class="box-item">
                            <label>Stock Inicial</label><br>
                            <input name="addInitialStock" type="text">
                        </div>
                        <div class="box-item">
                            <label>Stock Actual</label><br>
                            <input name="addActualStock" type="text">
                        </div>
                        <div class="box-item">
                            <label>Categoria</label><br>
                            <select name="addCategory" class = "rolSelector">
                                <option value="A">Categoria A</option>
                                <option value="B">Categoria B</option>
                                <option value="C">Categoria C</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="Crear" class = "userModalBtn">
                </form>
            </div>
        </dialog>
                <!-- Edit user -->
        <dialog class="editUserModal modal">
            <div class="modalHeader">
                <h1>Editar articulos</h1>
                <i class='bx bx-x closeBtnModalEU modalX'></i>
            </div>
            <div class="modalContent EUModal" id="myModal">
                <form method="post" action="editItem.php">
                    <div class="input-boxes">
                        <input type="hidden" name="editId" id="id">
                        <div class="box-item">
                            <label>Codigo</label><br>
                            <input name="editCode" id="code" value = "">
                        </div>
                        <div class="box-item">
                            <label>Descripcion</label><br>
                            <input name="editDes" id="description">
                        </div>
                        <div class="box-item">
                            <label>Stock Inicial</label><br>
                            <input name="editInitialStock" id="initialStock">
                        </div>
                        <div class="box-item">
                            <label>Stock Actual</label><br>
                            <input name="editActualStock" id="actualStock">
                        </div>
                        <div class="box-item">
                            <label>Tipo de cuenta</label><br>
                            <select name="editCat" class = "rolSelector" id ="cat">
                                <option value="A">Categoria A</option>
                                <option value="B">Categoria B</option>
                                <option value="C">Categoria C</option>
                            </select>
                        </div>
                        <div class="box-item">
                        <label>Estado de cuenta</label><br>
                        <select name="editState" class = "rolSelector" id ="state">
                                <option value=1>Activado</option>
                                <option value=0>Desactivado</option>
                        </select>
                    </div>
                    </div>
                    <input type="submit" name="editUserSubmit" class = "userModalBtn" value="editar">
                </form>
            </div>
        </dialog>
        </div>
    </div>

    <?php
        include("includes\sidebar_views.php");
    ?>
</body>
<script src="assets/js/sidebar.js"></script>
<script>
            //Create user window
        const closeButtonCU = document.querySelector(".closeBtnModalCU");
        const modalCU = document.querySelector(".createUserModal");
        const openButtonCU = document.querySelector(".openModalCU")
        openButtonCU.addEventListener("click", () => {
            modalCU.showModal();
        })

        closeButtonCU.addEventListener("click", () => {
            modalCU.close();
        })

        //Edit user windows
        const closeButtonEU = document.querySelector(".closeBtnModalEU");
        const modalEU = document.querySelector(".editUserModal");
        const openButtonEU = document.querySelectorAll(".openModalEU")
        closeButtonEU.addEventListener("click", () => {
            modalEU.close();
        })
</script>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.edit_data').click(function(e) {
            e.preventDefault();

            var user_id = $(this).closest('tr').find('.userID').text();
            console.log(user_id);

            $.ajax({
                method: "POST",
                url: "editItem.php",
                data: {
                    'click_edit_btn': true,
                    'user_id': user_id,
                },
                success: function (response) {
                    $.each(response, function (key, value){
                        $('#id').val(value['articulo_id']);
                        $('#description').val(value['articulo_codigo']);
                        $('#initialStock').val(value['stock_inicial']);
                        $('#actualStock').val(value['stock_Actual']);
                        $('#cat').val(value['categoria']);
                    });
                    modalEU.showModal();
                }
            });
        })
    });
</script>