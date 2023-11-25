<!-- settings menu -->
<dialog class="settingsModal modal">
    <div class="modalHeader">
        <h1>Configuración</h1>
        <i class='bx bx-x closeBtnModalS modalX'></i>
    </div>
        <div class="modalContent stgModal">
            <div class="switchContainer">
                <h2>Tema</h2>
                <div class="theme-switcher">
                    <input type="radio" id="light-theme" name="themes">
                    <label for="light-theme">
                        <span>
                        <i class='bx bxs-sun'></i> Claro
                        </span>
                    </label>
                    <input type="radio" id="dark-theme" name="themes">
                    <label for="dark-theme">
                        <span>
                            <i class='bx bxs-moon'></i> Oscuro
                        </span>
                    </label>
                    <span class="slider"></span>
                </div>
            </div>
                <ul>
                    <li>
                        <a class="openModalAS">
                            <i class='bx bx-cog'></i>
                            <span>Configuración de cuenta</span>
                        </a>
                    </li>
                    <li>
                        <a class="openModalAU">
                            <i class='bx bx-info-circle'></i>
                            <span>Acerca de la página</span>
                        </a>
                    </li>
                </ul>
            </div>
</dialog>
<!-- Account settings -->
<dialog class="accountStgModal modal">
    <div class="modalHeader">
        <h1>Configuración de cuenta</h1>
        <i class='bx bx-x closeBtnModalAS modalX'></i>
    </div>
    <div class="modalContent accStgModal">
        <ul>
            <h2>Información de cuenta</h2>
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
        <h1>Acerca de la página</h1>
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
    </div>
</dialog>
<!-- Logout menu -->
<dialog class="logoutModal modal">
    <div class="modalHeader">
        <h1>Cerrar sesión</h1>
        <i class='bx bx-x closeBtnModalL modalX'></i>
    </div>
    <div class="modalContent lgtModal">
        <div class="logoutText">Está seguro que quiere cerrar la sesión?</div>
            <div class="logoutButtons">
                <button id="logoutClose" class = "closeBtnModalL">Cancelar</button>
                <form action="logout.php" method="post">
                    <button id="logoutOk" type="submit">Ok</button>
                </form>
            </div>
        </div>
</dialog>