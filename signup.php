<?php session_start() ?>
<div class="container-fluid">
    <form action="" id="signup-frm" autocomplete="off">
        <div class="form-group">
            <label for="" class="control-label">Nombres</label>
            <input type="text" name="first_name" required="" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Apellidos</label>
            <input type="text" name="last_name" required="" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Contactos</label>
            <input type="text" name="mobile" required="" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Ciudad</label>
            <textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Correo Electronico</label>
            <input type="email" name="email" required="" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Contraseña</label>
            <input type="password" name="password" required="" class="form-control">
        </div>
        <button class="button btn btn-dark btn-sm">Crear Cuenta</button>
    </form>
</div>

<style>
#uni_modal .modal-footer {
    display: none;
}
</style>
<script>
$('#signup-frm').submit(function(e) {
    e.preventDefault()
    $('#signup-frm button[type="submit"]').attr('disabled', true).html('Guardando...');
    if ($(this).find('.alert-danger').length > 0)
        $(this).find('.alert-danger').remove();
    $.ajax({
        url: 'admin/ajax.php?action=signup',
        method: 'POST',
        data: $(this).serialize(),
        error: err => {
            console.log(err)
            $('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');

        },
        success: function(resp) {
            if (resp == 1) {
                location.href =
                    '<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
            } else {
                $('#signup-frm').prepend(
                    '<div class="alert alert-danger">Error ya hay un usuario con el mismo email .</div>'
                )
                $('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
            }
        }
    })
})
</script>