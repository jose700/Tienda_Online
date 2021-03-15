<?php session_start() ?>
<div class="container-fluid">
    <form action="" id="login-frm" autocomplete="off">
        <div class="form-group">
            <label for="" class="control-label">Email</label>
            <input type="email" name="email" required="" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Contraseña</label>
            <input type="password" name="password" required="" class="form-control">
            <small><a href="javascript:void(0)" id="new_account">Crear una cuenta</a></small>
        </div>
        <button class="button btn btn-dark btn-sm">Iniciar Sesion</button>
    </form>
</div>

<style>
#uni_modal .modal-footer {
    display: none;
}
</style>

<script>
$('#new_account').click(function() {
    uni_modal("Crear Cuenta", 'signup.php?redirect=index.php?page=checkout')
})
$('#login-frm').submit(function(e) {
    e.preventDefault()
    $('#login-frm button[type="submit"]').attr('disabled', true).html('Cargando....');
    if ($(this).find('.alert-danger').length > 0)
        $(this).find('.alert-danger').remove();
    $.ajax({
        url: 'admin/ajax.php?action=login2',
        method: 'POST',
        data: $(this).serialize(),
        error: err => {
            console.log(err)
            $('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

        },
        success: function(resp) {
            if (resp == 1) {
                location.href =
                    '<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
            } else {
                $('#login-frm').prepend(
                    '<div class="alert alert-danger">Correo electronico y/o Contraseña incorrecta.</div>'
                )
                $('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
            }
        }
    })
})
</script>