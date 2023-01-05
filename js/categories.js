function add_category() {
    let category_name = $('#category_name').val();
    if(category_name == '') {
        swal('¡Upps!', 'Debes agregar una categoría.', 'warning');
        return false;
    } else {
        $.ajax({
            type: 'POST',
            url: '../processes/categories/add-category.php',
            data: {
                'category_name': category_name
            },
            success: result => {
                result = result.trim();
                if(result == 1) {
                    $('#categories_table').load('categories/categories-table.php');
                    $('#category_name').val('');
                    swal('XD', 'Categoría agragada con éxito.', 'success');
                } else {
                    swal(':(', 'Error al agregar categoría.', 'error')
                }
            }
        });
    }
}
function delete_category(category_id) {
    category_id = parseInt(category_id);
    if (category_id < 0) {
        swal('¡Upps!', 'No tienes ID de categoría.', 'error');
    } else {
        swal({
            title: '¿Estas seguro de eliminar esta categoría?',
            text: 'No se puede recuperar esta acción.',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: '../processes/categories/delete-category.php',
                    data: {
                        'category_id': category_id
                    },
                    success: result => {
                        result = result.trim();
                        if (result == 1) {
                            $('#categories_table').load('categories/categories-table.php');
                            swal('XD', '¡Categoría eliminada con éxito!', 'success');
                        } else {
                            swal(':(', '¡No se pudo eliminar la categoría!', 'error')
                        }
                    }
                })
            }
        });
    }
}
function get_category(category_id) {
    $.ajax({
        type: 'POST',
        url: '../processes/categories/get-category.php',
        data: {
            'category_id': category_id
        },
        success: result => {
            result = $.parseJSON(result);
            $('#category_id').val(result['category_id']);
            $('#category_to_update').val(result['category_name'])
        }
    });
}
function update_category() {
    if ($('#category_to_update').val() == '') {
        swal('¡Upps!', 'Categoría vacía.', 'warning');
        return false;
    } else {
        $.ajax({
            type: 'POST',
            url: '../processes/categories/update-category.php',
            data: $('#form_update_category').serialize(),
            success: result => {
                result = result.trim();
                if (result == 1) {
                    $('#categories_table').load('categories/categories-table.php');
                    swal('¡Genial!', 'Categoría actualizada con éxito.', 'success');
                } else {
                    swal('¡Lo siento!', 'No se puedo actualizar la categoría.', 'error');
                }
            }
        });
    }
}