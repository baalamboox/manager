<?php
    session_start();
    require_once '../../classes/Connection.php';
    $connection = new Connection();
    $connection = $connection->connection();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT files.f_id AS f_id, users.u_names AS u_names, categories.category_name AS category_name, files.f_name AS f_name, files.f_type AS f_type, files.f_path AS f_path, files.f_insert AS f_insert FROM files_table AS files INNER JOIN users_table AS users ON files.u_id = users.u_id INNER JOIN categories_table AS categories ON files.category_id = categories.category_id and files.u_id = '$user_id'";
    $result = mysqli_query($connection, $sql);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="">
                <table class="table table-hover table-striped table-light table-resposive" id="manager_table_DataTable">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Nombre</th>
                            <th>Extensión del archivo</th>
                            <th>Descargar</th>
                            <th>Visualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $valid_extentions = array('png', 'jpg', 'txt', 'pdf', 'mp3', 'mp4', 'sql', 'zip', 'rar', 'docx', 'pptx');
                            while($show_data = mysqli_fetch_assoc($result)) {
                                $download_path = '../files/' . $user_id . '/' . $show_data['f_name'];
                                $file_name = $show_data['f_name'];
                                $file_id = $show_data['f_id'];
                        ?>
                                <tr>
                                    <td><?php echo $show_data['category_name'];?></td>
                                    <td><?php echo $show_data['f_name'];?></td>
                                    <td><?php echo $show_data['f_type'];?></td>
                                    <td>
                                        <a href="<?php echo $download_path;?>" download="<?php echo $file_name;?>" class="btn btn-dark btn-sm"><span class="fas fa-download"></span></a>
                                    </td>
                                    <td>
                                        <?php
                                            for($i = 0; $i < count($valid_extentions); $i++) { 
                                                if($valid_extentions[$i] == $show_data['f_type']) {
                                        ?>
                                                    <span class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modal_file_viewer" onclick="get_file_by_id('<?php echo $file_id;?>')">
                                                        <span class="fas fa-eye"></span>
                                                    </span>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <span class="btn btn-info btn-sm" onclick="delete_file('<?php echo $file_id;?>')"><span class="fas fa-trash"></span></span>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        $('#manager_table_DataTable').DataTable();
    });
</script>