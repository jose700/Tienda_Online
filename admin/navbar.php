<style>
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark'>


    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle " href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false ">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alertas de Quejas
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">Marzo 12, 2021</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">Abril 2, 2021</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">Abril 7, 2021</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Cerrar alertas</a>
            </div>
        </li>

        </div>
        </li>
    </ul>


    <div class="sidebar-list">
      
        <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i
                    class="fa fa-home"></i></span>Inicio</a>
        <a href="index.php?page=orders" class="nav-item nav-orders"><span class='icon-field'><i
                    class='bx bx-food-menu'></i>
            </span>Ordenes</a>
        <a href="index.php?page=menu" class="nav-item nav-menu"><span class='icon-field'><i
                    class='bx bx-food-menu'></i></i></span>Menu</a>
        <a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i
                    class="fa fa-list"></i></span>Lista de Productos</a>
        <li class="nav-item active">
            <a href="index.php?page=../Proveedor/supplier" class="nav-item nav-menu"><span class='icon-field'><i
                        class="fa fa-users"></i></span>Proveedores</a>
            <?php if($_SESSION['login_type'] == 1): ?>
            <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i
                        class="fa fa-users"></i></span> Usuarios</a>
            <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i
                        class="fa fa-cogs"></i></span>Configuracion</a>
            <?php endif; ?>
    </div>

</nav>
<script>
$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>


