<?php
    require_once '../database.php';
    require_once '../functionality.php';

    if(isset($_POST['user_id']))
    {
        $user_id = sanInput((int)$_POST['user_id']);

        $sql = "DELETE FROM users WHERE user_id = ?";
        executeSQL($conn, $sql, 'i', $user_id);
        header('Location:../controlpanel.php#delete-panel');
    }

    mysqli_close($conn);
