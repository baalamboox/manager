<?php
    session_start();
    if(isset($_SESSION['user'])) {
        require_once 'header.php';
?>
            <div class="row mt-4">
                <div class="col">
                    <div class="jumbotron jumbotron-fluid text-center rounded shadow bg-white">
                        <h1 class="display-4 mb-4">¡Hola! Bienvenido Guillermo.</h1>
                        <p class="lead">Este es un sistema gestor, que te va a permitir almacenar tus archivos.</p>
                        <hr class="my-4">
                        <p>Si quieres aprender como es que funciona, da clic en el botón.</p>
                        <a class="btn btn-info btn-lg" href="#" role="button">Aprender más</a>
                    </div>
                </div>
            </div>
<?php
        require_once 'footer.php';
    } else {
        header('location:../index.php');
    }
?>