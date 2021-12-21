<?php

    require_once '../database.php';
    require_once '../functionality.php';

    if(isset($_POST['username']))
    {

        $user_id = sanInput((int)$_POST['user_id']);
        $username = sanInput($_POST['username']);
        $email = sanInput($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $gender = sanInput($_POST['gender']);
        $birth_date = sanInput((string)$_POST['birth_date'] . ' 01:02:00');
        $admin = sanInput((int)$_POST['admin']);

        // Check for same email address
        $sql = "SELECT email FROM users WHERE email = $email";
        if(executeSQL($conn, $sql))
        {
            header('Location:../controlpanel.php?error=email address exist');
        }

        // Insert data to database
        $sql = "UPDATE users SET username = ?, email = ?, password = ?, gender = ?, birth_date = ?, admin = ?
                WHERE user_id = $user_id";
        executeSQL($conn, $sql, 'sssssi', $username, $email, $password, $gender, $birth_date, $admin);
        header('Location:../controlpanel.php#update-panel');
    }

?>