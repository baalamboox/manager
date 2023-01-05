<?php
    session_start();
    require_once '../../../classes/User.php';
    $user_obj = new User();
    $user = $_POST['login_user'];
    $password = sha1($_POST['login_password']);
    echo $user_obj->login($user, $password);
?>