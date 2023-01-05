<?php
    session_start();
    require_once "../../classes/Connection.php";
    $user_id = $_SESSION['user_id'];
    $connection = new Connection();
    $connection = $connection->connection();
?>
        <table class="table table-hover table-white table-striped table-resposive" id="table_categories_DataTable">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Fecha</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT category_id, category_name, category_insert FROM categories_table WHERE u_id = '$user_id'";
                    $result = mysqli_query($connection, $sql);
                    while($show_data = mysqli_fetch_assoc($result)) {
                        $category_id = $show_data['category_id'];
                ?>
                        <tr>
                            <td><?php echo $show_data['category_name'];?></td>
                            <td><?php echo $show_data['category_insert'];?></td>
                            <td>
                                <span class="btn btn-dark btn-sm" onclick="get_category('<?php  echo $category_id;?>')" data-toggle="modal" data-target="#modal_update_category">
                                    <span class="fas fa-edit"></span>
                                </span>
                            </td>
                            <td>
                                <span class="btn btn-info btn-sm" onclick="delete_category('<?php echo $category_id;?>')">
                                    <span class="fas fa-trash"></span>
                                </span>
                            </td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <script>
            $(document).ready(() => {
                $('#table_categories_DataTable').DataTable();
            });
        </script>