<?php
    session_start();
    require_once '../../classes/Manager.php';
    $manager = new Manager();
    $category_id = $_POST['file_categories'];
    $user_id = $_SESSION['user_id'];
    echo $user_id, $category_id;
    if($_FILES['files']['size'] > 0) {
        $user_dir = '../../files/'. $user_id;
        if(!file_exists($user_dir)){
            mkdir($user_dir, 0777, true);
        }
        $total_files = count($_FILES['files']['name']);
        for ($i=0; $i < $total_files; $i++) { 
            $file_name = $_FILES['files']['name'][$i];
            $explode = explode('.', $file_name);
            $file_type = array_pop($explode);
            $storage_path = $_FILES['files']['tmp_name'][$i];
            $final_path = $user_dir."/".$file_name;
            $files_data = array(
                "user_id"  => $user_id, 
                "category_id" => $category_id,
                "file_name" => $file_name,
                "file_type" => $file_type ,
                "file_path" => $final_path
            );
            if(move_uploaded_file($storage_path, $final_path)){
                $result = $manager->add_file($files_data);
                echo $result;
            }
        }
    } else {
        echo 0;
    }
?>