<?php
    require_once 'Connection.php';
    class Categories extends Connection {
        public function add_category($category_data) {
            $connection = Connection::connection();
            $sql = 'INSERT INTO categories_table(u_id, category_name) VALUES (?, ?)';
            $query = $connection->prepare($sql);
            $query->bind_param("is", $category_data['user_id'], $category_data['category_name']);
            $result = $query->execute();
            $query->close();
            return $result;
        }
        public function delete_category($category_id) {
            $connection = Connection::connection();
            $sql = 'DELETE FROM categories_table WHERE category_id = ?';
            $query = $connection->prepare($sql);
            $query->bind_param('i', $category_id);
            $result = $query->execute();
            $query->close();
            return $result;
        }
        public function get_category($category_id) {
            $connection = Connection::connection();
            $sql = "SELECT category_id, category_name FROM categories_table WHERE category_id = '$category_id'";
            $result = mysqli_query($connection, $sql);
            $category = mysqli_fetch_assoc($result);
            $category_data = array(
                'category_id' => $category['category_id'],
                'category_name' => $category['category_name']
            );
            return $category_data;
        }
        public function update_category($category_data) {
            $connection = Connection::connection();
            $sql = 'UPDATE categories_table SET category_name = ? WHERE category_id = ?';
            $query = $connection->prepare($sql);
            $query-> bind_param('si', $category_data['category_name'], $category_data['category_id']);
            $result = $query-> execute();
            $query->close();
            return $result;
        }
    }
?>