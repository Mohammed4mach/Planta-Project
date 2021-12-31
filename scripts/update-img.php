<?php

    if(isset($_FILES['user_image']['name']))
    {
        $img_name = $_FILES['user_image']['name'];
        $tmp_name = $_FILES['user_image']['tmp_name'];
        $size = $_FILES['user_image']['size'];
        $error = $_FILES['user_image']['error'];
        
        $name_arr = explode('.', $img_name);
        $img_extension = strtolower(end($name_arr));
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'jfif');


        // Error handling
        if($error)
        {
            header('Location:profile.php?error=try_again');            
            exit();
        }
        if($size > 1600000)
        {
            header('Location:profile?error=large_size');
            exit();
        }
        if(!in_array($img_extension, $allowed_extensions))
        {
            header('Location:profile?error=invalid_extension');
            exit();
        }

        // Rename the image and move to uploads
        $user_id = $_COOKIE['planta_user_id'];
        $new_img_name = $user_id . '.' . $img_extension;
        $img_destination = '../uploads/users-img/' . $new_img_name;
        $uploaded = move_uploaded_file($tmp_name, $img_destination);

        if(!$uploaded)
        {
            header('Location:profile.php?error=upload_failed');
            exit();
        }

        require_once('database.php');
        require_once('functionality.php');

        $sql = "UPDATE users SET img_path = '$img_destination' WHERE user_id = $user_id";
        executeSQL($conn, $sql);
        header('Location:profile.php');
    }