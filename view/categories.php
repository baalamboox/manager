<?php
    session_start();
    if (isset($_SESSION['user'])) {
        require_once 'header.php';
?>
            <div class="jumbotron jumbotron-fluid rounded shadow bg-white mt-4">
                <div class="container">
                    <h1 class="display-4">Categorías</h1>
                    <div class="row p-4">
                        <div class="col-sm-12 text-center">
                            <span class="btn btn-info" data-toggle="modal" data-target="#modal_add_category"><span class="fas fa-plus-circle"></span> Nueva categoría</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div id="categories_table"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form_add_category">
                                <div class="form-group">
                                    <label for="category_name">Nombre de la Categoría</label>
                                    <input type="text" class="form-control form-control-sm" id="category_name" name="category_name" placeholder="Ingrese nombre">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-group btn-sm btn-block">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-info" id="save_category">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_update_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form_update_category">
                                <div class="form-group">
                                    <input type="text" id="category_id" name="category_id" hidden="">
                                    <label for="category_to_update">Categoría</label>
                                    <input type="text" class="form-control form-control-sm" id="category_to_update" name="category_to_update">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-group btn-sm btn-block">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-info" id="update_category">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        require_once 'footer.php';
?>
            <script src="../js/categories.js"></script>

            <script>
                $(document).ready(() => {
                    $('#categories_table').load('categories/categories-table.php');
                    $('#save_category').click(() => {
                        add_category();
                    });
                    $('#update_category').click(() => {
                        update_category();
                    });
                });
            </script>
<?php
    } else {
        header("location:../index.php");
    }
?>