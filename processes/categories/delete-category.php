<?php
    session_start();
    require_once '../../classes/Categories.php';
    $categories = new Categories();
    echo $categories->delete_category($_POST['category_id']);
?>