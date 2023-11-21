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
        <!-- Account settings -->
        <dialog class="accountStgModal modal">
            <div class="modalHeader">
                <h1>Configuracion de cuenta</h1>
                <i class='bx bx-x closeBtnModalAS modalX'></i>
            </div>
            <div class="modalContent accStgModal">
                <ul>
                    <h2>Informacion de cuenta</h2>
                    <li>
                        <i class='bx bx-hash'></i>
                        <span>ID del usuario: <?= $user["empleado_id"] ?></span>
                    </li>
                    <li>
                        <i class='bx bx-user'></i>
                        <span>Nombre: <?= $user["nombre"] ?></span>
                    </li>
                    <li>
                        <i class='bx bx-user'></i>
                        <span>Nombre de usuario: <?= $user["nombre_usuario"] ?></span>
                    </li>
                    <li>
                        <i class='bx bx-user'></i>
                        <span>Tipo de cuenta: <?= $user["tipo_cuenta"] ?></span>
                    </li>
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
                    <form action="logout.php" method="post">
                        <button id="logoutOk" type="submit">Ok</button>
                    </form>
                </div>
            </div>
        </dialog>