<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inicio</title>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-app.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <!--<link rel="stylesheet" href="../js/jquery-ui.min.js">
    <link rel="stylesheet" href="../css/bootstrap.min.css">-->


    <!---añadimos bootstrap-->
</head>

<body style="background-color:#008080;">

    <?php 
        		if(isset($_SESSION['login_user_id'])){
					$data = "where c.user_id = '".$_SESSION['login_user_id']."' ";	
				}else{
					$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
					$data = "where c.client_ip = '".$ip."' ";	
				}
				$total = 0;
				$get = $conn->query("SELECT *,c.id as cid FROM cart c inner join product_list p on p.id = c.product_id ".$data);
				while($row= $get->fetch_assoc()):
					$total += ($row['qty'] * $row['price']);
        		?>
    <?php endwhile; ?>

    <style>
    /* Media query for mobile viewport */
    @media screen and (max-width: 500px) {
        #paypal-button-container {
            width: 100%;
        }
    }

    /* Media query for desktop viewport */
    @media screen and (min-width: 500px) {
        #paypal-button-container {
            width: 250px;
        }
    }
    </style>
    <br>
    <!--AGREGAMOS UN MENSAJE PARA MOSTRARLE AL CLIENTE EL VALOR TOTAL A PAGAR-->
    <div class="jumbotron text-center" style="background-color:#008080;color:#FFFFFF;background-size:100%;">
        <h1 class="display-4">¡PASO FINAL!</h1>

        <hr class="my-4">

        <p class="lead">Estas a punto de pagar la cantidad de:

        <h2>$<?php echo number_format($total,2); ?></h2>


        <!-- Set up a container element for the button -->
        <div id="paypal-button-container" style="margin: auto;"></div>


        </p>

        <p>La factura se podra descargar una vez que se realice el pago <br />
            <br />

            <strong>(Mas informacion escribir al siguiente correo electronico: RapiCam@gmail.com)</strong>
        </p>

    </div>
    <!--AGREGAMOS LA API DE PAYPAL PARA AGREGAR EL BOTON DE COMPRA POR MEDIO DE PAYPAL-->

    <script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        env: 'sandbox', //production, sandbox
        style: {

            //layout: 'horizontal',
            label: 'checkout', // credit , pay , buynow, generic
            //size: 'responsive', // samll, meium, large, responsive
            shape: 'pill', // pill, rect
            color: 'gold' // gold, blue, silver, black

        },

        client: {
            sandbox: 'AVoUK8uh1cDSOsa82XMsW6nMASv3ErVe9yUPWlG65ffkINA2A1ulvme65NDl-5tbDqBdrM0y9Js5YTWE',
            production: 'AdpoDZNnrTRhKkBbv4gY1ygOEElfgR25oWswcCmrcdJwswtI9xeq7ndFqnlXqRbztyIqax7-j0JEO1ol'
        },
        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [{

                    }]
                }
            });
        },
        //MOSTAR SI EL PAGO SE REALIZO CORRECTAMENTE
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                console.log(data);


            });
        }
    }).render('#paypal-button-container');
    </script>



</body>

</html>