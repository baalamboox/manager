<?php
    class Connection {
        public function connection() {
            $connection = mysqli_connect('localhost', 'root', '', 'gestor');
            $connection->set_charset('utf8mb4');
            return $connection;
        }
    }
?>