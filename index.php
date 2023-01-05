<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Iniciar sesión</title>
        <link rel="stylesheet" href="lib/bootstrap-4.6.0-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="fadeIn first">
                    <img src="img/file-logo.svg" id="icon" alt="User icon">
                    <h1>Gestor de Archivos</h1>
                </div>
                <form method="POST" id="form_login" onsubmit="return logear()">
                    <input type="text" id="login_user" class="fadeIn second" name="login_user" placeholder="Ingrese usuario" required="">
                    <input type="password" id="login_password" class="fadeIn third" name="login_password" placeholder="Ingrese contraseña" required="">
                    <input type="submit" class="fadeIn fourth" value="Ingresar">
                </form>
                <div id="formFooter">
                    <a class="underlineHover" href="signup.php">Registrar</a>
                </div>
            </div>
        </div>
        <script src="lib/jquery-3.6.0/jquery-3.6.0.min.js"></script>
        <script src="lib/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function logear(){
                $.ajax({
                    type: 'POST',
                    url: 'processes/user/login/login.php',
                    data: $('#form_login').serialize(), // Obtine todos los datos del formulario.
                    success: result => {
                        result = result.trim(); // Quita el los espacios en blanco de los extremos.
                        console.log(result);
                        if (result == 1) {
                            window.location = "view/start.php";
                        } else {
                            $('#form_login')[0].reset();
                            swal(":(", "El usuario o contraseña son erroneos o no exiten.", "error");
                        }
                    }
                });
                return false;
            }
        </script>
    </body>
</html>