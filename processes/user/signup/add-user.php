<?php
    require_once '../../../classes/User.php';
    $user_obj = new User();
    $user_data = array(
        'signup_user_names' => $_POST['signup_user_names'],
        'signup_user_birthday' => $_POST['signup_user_birthday'],
        'signup_user_email' => $_POST['signup_user_email'],
        'signup_user_name' => $_POST['signup_user_name'],
        'signup_user_password' => sha1($_POST['signup_user_password'])    
    );
    echo $user_obj->add_user($user_data);
?>