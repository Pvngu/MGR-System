<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGR - Admin</title>
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/home.css">
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
                <div class="itemsHeader">Menu</div>
                <li>
                    <a href="home.html">
                        <i class='bx bx-home-alt-2'></i>
                        <span>Home</span>
                    </a>
                    <span class="tooltip">Home</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-table'></i>
                        <span>Inventario</span>
                    </a>
                    <span class="tooltip">Inventario</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bxs-edit' ></i>
                        <span>Reportes</span>
                    </a>
                    <span class="tooltip">Reportes</span>
                </li>
                <li>
                    <a href="user.html">
                        <i class='bx bxs-user-account'></i>
                        <span>Usuarios</span>
                    </a>
                    <span class="tooltip">Usuarios</span>
                </li>
            </div>
            <div class="bottomItems">
                <div class="itemsHeader">preferencias</div>
                <li>
                    <a class="openModalS">
                        <i class='bx bx-cog'></i>
                        <span>Configuracion</span>
                    </a>
                    <span class="tooltip">Configuracion</span>
                </li>
                <li>
                    <a class="openModalL">
                        <i class='bx bx-log-out-circle'></i>
                        <span>Cerrar sesion</span>
                    </a>
                    <span class="tooltip">Cerrar sesion</span>
                </li>
            </div>
        </ul>
    </div>
    <div class="home">
        <header>
            <div class="headerContent">
                <div class="leftContent">
                    <h1 class="bizName">MGR MAQUINADOS</h1>
                </div>
                <div class="rightContent">
                    <i class='bx bx-bell'></i>
                    <div class="userProfile">
                        <div class="userText">
                            <div class="name">Nombre Usuario</div>
                            <div class="job">Rol</div>
                        </div>
                        <div class="profilePicture">
                            <i class='bx bx-user'></i>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="welcome">
                <h1>Bienvenido al sistema de inventarios de MGR</h1>
                <h2>Menu principal</h2>
            </div>
                <div class="container">
                    <a class="item-container" href="#">
                        <img src="assets/images/inventory.png" alt="icon image">
                        <h2>Ver inventario</h2>
                        <p>Muestra la disponibilidad y cantidades de productos para una gestión eficiente del stock del inventario.</p>
                    </a>
                    <a class="item-container" href="#">
                        <img src="assets/images/Report.png" alt="icon image">
                        <h2>Realizar reportes</h2>
                        <p>Ofrece datos esenciales para generar informes detallados sobre el inventario, optimizando la toma de decisiones.</p>
                    </a>
                    <a class="item-container" href="#">
                        <img src="assets/images/userAdmin.png" alt="icon image">
                        <h2>Administrar usuarios</h2>
                        <p>Acceso al control completo sobre perfiles en la plataforma.</p>
                    </a>
                    <a class="item-container" href="#">
                        <img src="assets/images/settings-icon.png" alt="icon image">
                        <h2>Configuracion</h2>
                        <p>Acceso a las configuraciones de la página, incluyendo aspecto, tamaño de letra e informacion adicional.</p>
                    </a>
                </div>
        </div>
        <!-- settigns menu -->
        <dialog class="settingsModal modal">
            <div class="modalHeader">
                <h1>Configuracion</h1>
                <i class='bx bx-x closeBtnModalS modalX'></i>
            </div>
            <div class="modalContent stgModal">
                <div class="switchContainer">
                    <h2>Tema</h2>
                    <div class="theme-switcher">
                        <input type="radio" id="light-theme" name="themes">
                        <label for="light-theme">
                            <span>
                                <i class='bx bxs-sun'></i> Brillo
                            </span>
                        </label>
                        <input type="radio" id="dark-theme" name="themes">
                        <label for="dark-theme">
                            <span>
                                <i class='bx bxs-moon'></i> Dark
                            </span>
                        </label>
                        <span class="slider"></span>
                    </div>
                </div>
                <ul>
                    <li>
                        <a class="openModalAS">
                            <i class='bx bx-cog'></i>
                            <span>Configuracion de cuenta</span>
                        </a>
                    </li>
                    <li>
                        <a class="openModalAU">
                            <i class='bx bx-info-circle'></i>
                            <span>Acerca de la pagina</span>
                        </a>
                    </li>
                </ul>
            </div>
        </dialog>
        <!-- Logout menu -->
        <dialog class="logoutModal modal">
            <div class="modalHeader">
                <h1>Cerrar sesion</h1>
                <i class='bx bx-x closeBtnModalL modalX'></i>
            </div>
            <div class="modalContent lgtModal">
                <div class="logoutText">Esta seguro que quiere cerrar la sesion?</div>
                <div class="logoutButtons">
                    <button id="logoutClose" class = "closeBtnModalL">Cancelar</button>
                    <button id="logoutOk" type="submit">Ok</button>
                </div>
            </div>
        </dialog>
        <!-- Account settings -->
        <dialog class="accountStgModal modal">
            <div class="modalHeader">
                <h1>Configuracion de cuenta</h1>
                <i class='bx bx-x closeBtnModalAS modalX'></i>
            <div class="modalContent accStgModal">
                <ul>
                    <h2>Cuenta</h2>
                    <li>
                        <i class='bx bx-user'></i>
                        <span>Nombre de usuario: </span>
                        <span>rodolfo el reno</span>
                    </li>
                    <li>
                        <i class='bx bx-user'></i>
                        <span>Tipo de cuenta: </span>
                        <span>Admin todo poderoso</span>
                    </li>
                    <h2>Pagina</h2>
                    <form action="">
                        <li>
                            <i class='bx bx-font-size' ></i>
                            <label for="fontSizeSelector">Tamano de letra:</label>
                            <select name="font-size" id="fontSizeSelector" onchange="changeFontSize()">
                                <option value="small">Pequeña</option>
                                <option value="normal" selected>Normal</option>
                                <option value="big">Grande</option>
                            </select>
                        </li>
                    </form>
                </ul>
            </div>
        </dialog>
        <!-- About us -->
        <dialog class="aboutUsModal modal">
                <div class="modalHeader">
                    <h1>Acerca de la pagina</h1>
                    <i class='bx bx-x closeBtnModalAU modalX'></i>
                </div>
                <div class="modalContent AUModal">
                    <p>En este sistema, nos dedicamos a proporcionar herramientas avanzadas y fáciles de usar para ayudarte a mantener un control preciso de tus existencias. Optimiza tus procesos, reduce costos y mejora la eficiencia con nuestras funciones intuitivas.</p>
                    <h2>Mision</h2>
                    <p>Facilitar la gestión de inventarios para empresas de todos los tamaños, permitiéndote tomar decisiones informadas y maximizar la eficiencia operativa.</p>
                    <h2>Caracteristicas Destacadas</h2>
                    <ul>
                        <li>Seguimiento en tiempo real</li>
                        <li>Alertas de reabastecimiento</li>
                        <li>Informes detallados</li>
                        <li>Integracion con sistemas de punto de venta (POS)</li>
                    </ul>
                    <p></p>
                </div>
        </dialog>
    </div>
</body>
<script>
    //// sidebar button
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    btn.onclick = function() {
        sidebar.classList.toggle("active");
    }

    //// popup window
    // settings window
    const closeButtonS = document.querySelector(".closeBtnModalS")
    const modalS = document.querySelector(".settingsModal")
    const openButtonS = document.querySelector(".openModalS")
    openButtonS.addEventListener("click", () => {
        modalS.showModal()
    })
    closeButtonS.addEventListener("click", () => {
        modalS.close();
    })
    // logout window
    const closeButtonL = document.querySelectorAll(".closeBtnModalL");
    const modalL = document.querySelector(".logoutModal")
    const openButtonL = document.querySelector(".openModalL")
    openButtonL.addEventListener("click", () => {
        modalL.showModal()
    })

    for(i = 0; i < closeButtonL.length; i++){
        closeButtonL[i].addEventListener("click", () => {
        modalL.close();
    })
    }
    //About us window
    const closeButtonAU = document.querySelector(".closeBtnModalAU")
    const modalAU = document.querySelector(".aboutUsModal");
    const openButtonAU = document.querySelector(".openModalAU");
    openButtonAU.addEventListener("click", () => {
        modalAU.showModal()
    })

    closeButtonAU.addEventListener("click", () => {
        modalAU.close();
    })
        //Account settings window
        const closeButtonAS = document.querySelector(".closeBtnModalAS")
        const modalAS = document.querySelector(".accountStgModal");
        const openButtonAS = document.querySelector(".openModalAS");
        openButtonAS.addEventListener("click", () => {
        modalAS.showModal()
    })

    closeButtonAS.addEventListener("click", () => {
        modalAS.close();
    })

    ////Theme switcher slider
    var html = document.getElementsByTagName('html');
    var radios = document.getElementsByName('themes')

    for (i = 0; i < radios.length; i++){
        radios[i].addEventListener('change', function() {
            html[0].classList.remove(html[0].classList.item(0));
            html[0].classList.add(this.id);
        });
    }

    ////Font size selector
    function changeFontSize(){
        var body = document.body;
        var selector = document.getElementById('fontSizeSelector');
        var selectedValue = selector.value;
        switch (selectedValue) {
            case 'small':
                body.style.fontSize = '12px';
                break;
            case 'normal':
                body.style.fontSize = '16px';
                break;
            case 'big':
                body.style.fontSize = '20px';
                break;
            default:
                body.style.fontSize = '16px';
        }
    }
</script>
</html>