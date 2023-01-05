<?php
    require_once "Connection.php";
    class User extends Connection {
        public function add_user($user_data) {
            $connection = Connection::connection();
            if(self::find_out_reapeat_user($user_data['signup_user_name'])) {
                return false;
            } else {
                $sql = 'INSERT INTO users_table(u_names, u_birthday, u_email, u_user, u_password) VALUES (?, ?, ?, ?, ?)';
                $query = $connection->prepare($sql);
                $query->bind_param('sssss', $user_data['signup_user_names'], $user_data['signup_user_birthday'], $user_data['signup_user_email'], $user_data['signup_user_name'], $user_data['signup_user_password']);
                $query_executed = $query->execute();
                $query->close();
                return $query_executed;
            }
        }
        public function find_out_reapeat_user($user) {
            $connection = Connection::connection();
            $sql = "SELECT u_user FROM users_table WHERE u_user = '$user'";
            $result = mysqli_query($connection, $sql);
            $data = mysqli_fetch_assoc($result);
            if($data['u_user'] == $user) {
                return true;
            } else {
                return false;
            }
        }
        public function login($user, $password) {
            $connection = Connection::connection();
            $sql = "SELECT count(*) as user_existed FROM users_table WHERE u_user = '$user' AND u_password = '$password'";
            $result = mysqli_query($connection, $sql);
            $user_result = mysqli_fetch_array($result)['user_existed'];
            if($user_result > 0) {
                $_SESSION['user'] = $user;
                $sql = "SELECT u_id FROM users_table WHERE u_user = '$user' AND u_password = '$password'";
                $result = mysqli_query($connection, $sql);
                $user_id = mysqli_fetch_array($result)[0];
                $_SESSION['user_id'] = $user_id;
                return 1;
            } else {   
                return 0;
            }
        }
    }
?>