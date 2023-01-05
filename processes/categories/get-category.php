<?php
    require_once '../../classes/Categories.php';
    $categories = new Categories();
    echo json_encode($categories->get_category($_POST['category_id']));
?>