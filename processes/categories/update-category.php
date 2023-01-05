<?php
    require_once '../../classes/Categories.php';
    $categories = new Categories();
    $category_data = array(
        'category_id' => $_POST['category_id'],
        'category_name' => $_POST['category_to_update']
    );
    echo $categories->update_category($category_data);
?>