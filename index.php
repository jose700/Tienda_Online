<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?>

<style>
header.masthead {
    /*background: url("admin/assets/uploads/1600312980_blank.jpg");*/
    background: url("https://negozona.com/uploads/picture/image/10393/WhatsApp_Image_2019-06-10_at_1.39.30_PM.jpeg");
    background-repeat: no-repeat;
    background-size: 100%;

}
</style>

<body id="page-top">

    <!-- Navigation-->
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background-color:#708090">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['setting_name'] ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;"
                placeholder="Buscar producto..." /><input type="submit" id="btnsearch" value="Buscar"
                style=cursor:pointer name="search" />
            <div class="collapse navbar-collapse" id="navbarResponsive" style="color:white">
                <ul class="navbar-nav ml-auto my-2 my-lg-1" style="color:white">
                    <li class="nav-item "><a class="nav-link js-scroll-trigger" href="index.php?page=home">Inicio</a>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=cart_list"><span>
                                <span class="badge badge-danger item_count">0</span> <i class="fa fa-shopping-cart"></i>
                            </span>Mi Carrito</a></li>
                            
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">Nosotros</a>
                    </li>
                        <li class="nav-item "><a class="nav-link js-scroll-trigger" href="index.php?page=ubicacion">Ubicacion</a>
                    </li>
                    <?php if(isset($_SESSION['login_user_id'])): ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger"
                            href="admin/ajax.php?action=logout2"><?php echo "Bienvenido ". $_SESSION['login_first_name'].' '.$_SESSION['login_last_name'] ?>
                            <i class="fa fa-power-off"></i></a></li>
                    <?php else: ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)"
                            id="login_now">Ingresar</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>


    <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar</h5>
                </div>
                <div class="modal-body">
                    <div id="delete_content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='confirm' onclick="">Continuar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uni_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='submit'
                        onclick="$('#uni_modal form').submit()">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uni_modal_right" role='dialog'>
        <div class="modal-dialog modal-full-height  modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-arrow-righ t"></span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer class="bg-light py-3">
        <div class="container">
            <div class="small text-center text-muted" style="color:black">Siguenos en:

                <a class="text-dark" href="https://www.facebook.com/login.php" target="toggle"><strong
                        style="list-style: none">
                        Facebook
                    </strong></a>
                <a class="text-dark" href="https://mobile.twitter.com/login" target="toggle">
                    <strong>Twitter</strong>
                </a>
                <a class="text-dark" href="https://www.instagram.com/" target="toggle">
                    <strong>Instagram</strong>
                </a>
            </div>
        </div>
        </div>
    </footer>

    <?php include('footer.php') ?>
</body>

<?php $conn->close() ?>

</html>