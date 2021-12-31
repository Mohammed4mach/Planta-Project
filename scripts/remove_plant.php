<?php
    
    require_once('database.php');
    require_once('functionality.php');


    if(isset($_GET['plant_id']) && isset($_COOKIE['planta_user_id']))
    {
        $user_id = sanInput($_COOKIE['planta_user_id']);
        $plant_id = sanInput($_GET['plant_id']);

        $sql = 'DELETE FROM interests WHERE user_id = ? AND plant_id = ?';
        executeSQL($conn, $sql, 'ii', $user_id, $plant_id);

        header('Location:profile.php');
    }
    else
    {
        header('Location:profile.php');
    }

    mysqli_close($conn);