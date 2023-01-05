<?php
    session_start();
    require_once '../../classes/Categories.php';
    $categories = new Categories();
    $category_data = array(
        'user_id' => $_SESSION['user_id'],
        'category_name' => $_POST['category_name']
    );  
    echo $categories->add_category($category_data);
?>