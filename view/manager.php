<?php
    session_start();
    if (isset($_SESSION['user'])) {
        require_once 'header.php';
?>
            <div class="jumbotron jumbotron-fluid rounded shadow bg-white mt-4">
                <div class="container">
                    <h1 class="display-4">Gestor de archivos</h1>
                    <div class="text-center mt-4">
                        <span class="btn btn-info text-center" data-toggle="modal" data-target="#modal_add_files"><span class="fas fa-plus-circle"></span> Agregar archivo</span>
                    </div>
                    <div class="mt-3" id="file_manager_table"></div>
                </div>
            </div>
            <div class="modal fade" id="modal_add_files" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Subir archivo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form_files" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <label for="load_categories">Categoría</label>
                                    <div id="load_categories"></div>
                                </div>
                                <div class="form-group">
                                    <label for="files[]">Seleccionar archivos</label>
                                    <input type="file" class="form-control-file" id="files[]" name="files[]" multiple="">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-group btn-sm btn-block">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-info" id="save_files">Subir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="view_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="got_file"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

<?php
        include "footer.php";
?>
        <script src="../js/manager.js"></script>
        <script>
            $(document).ready(() => {
                $('#file_manager_table').load("manager/manager-table.php");
                $('#load_categories').load("categories/select-categories.php");
                $('#save_files').click(() => {
                    add_files();
                });
            });
        </script>
<?php
    } else {
        header('location:../index.php');
    }
?>