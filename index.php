<?php

// Si han aceptado la política
if (isset($_REQUEST['politica-cookies'])) {
    // Calculamos la caducidad, en este caso un año
    $caducidad = time() + (60 * 60 * 24 * 365);
    // Crea una cookie con la caducidad
    setcookie('politica', '1', $caducidad);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="#" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login </title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
    <link href="dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">

</head>

<body style="height: 100vh;">
    <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin" action="" method="post">
                <span class="login-form-title">LOGIN</span>

                <div class="wrap-input100" data-validate="Usuario incorrecto">
                    <input class="input100" type="email" id="usuario" name="usuario" placeholder="Correo">
                    <span class="focus-efecto"></span>
                </div>

                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-efecto"></span>
                </div>

                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">CONECTAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="position-relative bottom-0" style="z-index: 10;">
        <div class="nav">
            <?php if (!isset($_REQUEST['politica-cookies']) && !isset($_COOKIE['politica'])) : ?>
                <!-- Mensaje de cookies -->
                <div class="row m-2">
                    <div class="col-sm-3 mr-3">
                        <h5>Cookies</h5>
                    </div>
                    <p>¿Aceptas nuestras cookies?</p>
                    <a href="?politica-cookies=1">Aceptar</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="codigo.js"></script>
</body>

</html>