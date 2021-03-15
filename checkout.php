<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4 page-title">
                <h3 class="text-white">Llenar Datos</h3>
                <hr class="divider my-4" />

            </div>

        </div>
    </div>
</header>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="" id="checkout-frm">
                <h4 class="text-center">Confirmar Compra</h4>
                <div class="form-group">
                    <label for="" class="control-label">Nombres</label>
                    <input type="text" name="first_name" required="" class="form-control"
                        value="<?php echo $_SESSION['login_first_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Apellidos</label>
                    <input type="text" name="last_name" required="" class="form-control"
                        value="<?php echo $_SESSION['login_last_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Telefono</label>
                    <input type="text" name="mobile" required="" class="form-control"
                        value="<?php echo $_SESSION['login_mobile'] ?>">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Ciudad</label>
                    <textarea cols="30" rows="3" name="address" required=""
                        class="form-control"><?php echo $_SESSION['login_address'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Email</label>
                    <input type="email" name="email" required="" class="form-control"
                        value="<?php echo $_SESSION['login_email'] ?>">
                </div>

                <div class="text-center">
                    <button class="btn btn-block btn-primary">Ordenar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#checkout-frm').submit(function(e) {
        e.preventDefault()

        start_load()
        $.ajax({
            url: "admin/ajax.php?action=save_order",
            method: 'POST',
            data: $(this).serialize(),
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Orden realizada correctamente.")
                    setTimeout(function() {
                        location.replace('index.php?page=home')
                    }, 1500)
                }
            }
        })
    })
})
</script>