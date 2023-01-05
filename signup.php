<!DOCTYPE html>
<html lang='es-MX'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Registro</title>
        <link rel="stylesheet" href="lib/bootstrap-4.6.0-dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <form class="p-4 bg-white rounded shadow" id="form_signup" method="POST" onsubmit="return add_new_user()">
                        <h3 class="text-center">Registro</h3>
                        <hr>
                        <div class="form-group">
                            <label for="signup_user_names">Nombre(s)</label>
                            <input type="text" class="form-control form-control-sm" id="signup_user_names" name="signup_user_names" placeholder="Ingrese nombre(s)" required="">
                        </div>
                        <div class="form-group">
                            <label for="signup_user_birthday">Fecha de nacimiento</label>
                            <input type="date" class="form-control form-control-sm" id="signup_user_birthday" name="signup_user_birthday" required="">
                        </div>
                        <div class="form-group">
                            <label for="signup_user_email">Email</label>
                            <input type="email" class="form-control form-control-sm" id="signup_user_email" name="signup_user_email" placeholder="Ingrese email" required="">
                        </div>
                        <hr class="mt-4">
                        <div class="form-group">
                            <label for="signup_user_name">Usuario</label>
                            <input type="text" class="form-control form-control-sm" id="signup_user_name" name="signup_user_name" placeholder="Ingrese usuario" required="">
                        </div>
                        <div class="form-group">
                            <label for="signup_user_password">Contraseña</label>
                            <input type="password" class="form-control form-control-sm" id="signup_user_password" name="signup_user_password" placeholder="Ingrese contraseña" required="">
                        </div>
                        <div class="btn-group btn-block">
                            <button class="btn btn-info btn-sm">Registrar</button>
                            <a href="index.php" class="btn btn-dark btn-sm">Iniciar sesión</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="lib/jquery-3.6.0/jquery-3.6.0.min.js"></script>
        <script src="lib/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function add_new_user() {
                $.ajax({
                    method: 'POST',
                    url: 'processes/user/signup/add-user.php',
                    data: $('#form_signup').serialize(),
                    success: result => {
                        result = result.trim();
                        if (result == 1) {
                            $('#form_signup')[0].reset();
                            swal('XD', '¡Registro éxitoso!', 'success');
                        } else {
                            console.log(result);
                            swal('¡Registro no éxitoso!', 'El usuario que ingresaste ya existe', 'error');
                        }
                    }
                });
                return false;
            }
        </script>
    </body>
</html>