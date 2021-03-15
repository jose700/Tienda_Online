<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta description="Estudiante: Campuzano Espinal Jose Luis">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin | Sistema de pedidos de alimentos en línea </title>


    <?php include('./header.php'); ?>
    <?php include('./db_connect.php'); ?>
    <?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}
?>

</head>
<style>
body {
    width: 100%;
    height: calc(100%);
    /*background: #007bff;*/
}

main#main {
    width: 100%;
    height: calc(100%);
    background: white;
}

#login-right {
    position: absolute;
    right: 0;
    width: 40%;
    height: calc(100%);
    background: white;
    display: flex;
    align-items: center;
}

#login-left {
    position: absolute;
    left: 0;
    width: 60%;
    height: calc(100%);
    background: #00000061;
    display: flex;
    align-items: center;
}

#login-right .card {
    margin: auto
}

.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    border-radius: 50% 50%;
    height: 29vh;
    width: 13vw;
    display: flex;
    align-items: center;
}

.logo img {
    height: 80%;
    width: 80%;
    margin: auto
}
</style>

<body style="background-image: url('https://negozona.com/uploads/picture/image/10393/WhatsApp_Image_2019-06-10_at_1.39.30_PM.jpeg');
background-size:100%;
background-repeat: no-repeat;
">
    <!-- <main id="main" class=" bg-dark">
        <div id="login-left">
            <div class="logo">
                <img src="../assets/img/sample_logo.png" alt="">
            </div>
        </div>-->
    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="login-rigth" style="width: 100%;
  max-width: 1000px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  ">
        <div class="card col-md-6">
            <div class="card-body" style="background-color:#008b8b">
                <h5 id="" style="text-align:center;color:white">INICIAR SESION</h5>
                <img src="https://www.psdgraphics.com/file/user-icon.jpg" class="img-rounded mx-auto" width="60px"
                    alt="10px" height="65px" style="border-radius:310px;display: block;
  margin-left: auto;
  margin-right: auto;">
                <form id="login-form" autocomplete="off">
                    <div class="form-group">
                        <label for="username" class="control-label text-white">Usuario</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label text-white">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <center><button class="btn-sm btn-block btn-wave col-md-4 btn-dark">Ingresar</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
    </main>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>
<script>
$('#login-form').submit(function(e) {
    e.preventDefault()
    $('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
    if ($(this).find('.alert-danger').length > 0)
        $(this).find('.alert-danger').remove();
    $.ajax({
        url: 'ajax.php?action=login',
        method: 'POST',
        data: $(this).serialize(),
        error: err => {
            console.log(err)
            $('#login-form button[type="button"]').removeAttr('disabled').html('Login');

        },
        success: function(resp) {
            if (resp == 1) {
                location.href = 'index.php?page=home';
            } else if (resp == 2) {
                location.href = 'voting.php';
            } else {
                $('#login-form').prepend(
                    '<div class="alert alert-danger">Correo electronico y/o Contraseña Incorrectas.</div>'
                )
                $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
            }
        }
    })
})
</script>

</html>