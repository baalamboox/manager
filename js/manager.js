function add_files() {
    let form_data = new FormData(document.getElementById('form_files'));
    $.ajax({
        type: 'POST',
        url: '../processes/manager/save-file.php',
        dataType: 'html',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: result => {
            result = result.trim();
            if (result == 1) {
                $('#form_files')[0].reset();
                $('#file_manager_table').load('manager/manager-table.php');
                swal('¡Genial!', 'Archivo subido correctamente.', 'success');
            } else {
                swal('¡Upps!', 'No se pudo subir el archivo.', 'error');
            }
        }
    });
}
function delete_file(file_id) {
    swal({
        title: "¿Estas seguro de eliminar este archivo?",
        text: "Una vez eliminado, no podrá recuperarse.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    data: "idArchivo=" + idArchivo,
                    url: "../procesos/gestor/eliminarArchivo.php",
                    success: function (respuesta) {
                        respuesta = respuesta.trim();
                        if (respuesta == 1) {
                            $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                            swal("Eiminado con éxito", {
                                icon: "success",
                            });
                        } else {
                            swal("Error al eliminar!", {
                                icon: "error",
                            });
                        }
                    }
                });
            }
        });
}
function get_file_by_id(idArchivo) {
    $.ajax({
        type: "POST",
        data: "idArchivo=" + idArchivo,
        url: "../procesos/gestor/obtenerArchivo.php",
        success: function (respuesta) {
            $('#archivoObtenido').html(respuesta);
        }
    });
}