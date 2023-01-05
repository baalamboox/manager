<?php
    session_start();
    require_once "../../classes/Connection.php";
    $connection = new Connection();
    $connection = $connection->connection();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT category_id, category_name FROM  categories_table WHERE u_id = '$user_id'";
    $result = mysqli_query($connection, $sql);
?>
    <select class="form-control" id="file_categories" name="file_categories">
        <?php
            while ($show_data = mysqli_fetch_array($result)) {
                $category_id = $show_data['category_id'];
        ?>
                <option value="<?php echo $category_id;?>"><?php echo $show_data['category_name'];?></option>
        <?php
            }
        ?>
    </select>