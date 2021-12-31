<?php

    require_once '../database.php';
    require_once '../functionality.php';

    if(isset($_POST['username']))
    {

        $user_id = sanInput(genId(9));
        $username = sanInput($_POST['username']);
        $email = sanInput($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $gender = sanInput($_POST['gender']);
        $birth_date = sanInput((string)$_POST['birth_date'] . ' 01:02:00');
        $create_date = sanInput(date('Y-m-d H:i:s', time()));
        $admin = sanInput((int)$_POST['admin']);
        // Check for same id in db
        $sql = "SELECT user_id FROM users WHERE user_id = $user_id";
        while(executeSQL($conn, $sql))
        {
            $user_id = genId(9);
        }

        // Check for same email address
        $sql = "SELECT email FROM users WHERE email = $email";
        if(executeSQL($conn, $sql))
        {
            header('Location:../controlpanel.php?error=email address exist');
        }

        // Insert data to database
        $sql = 'INSERT INTO users (user_id, username, email, password, gender, birth_date, create_date, admin)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
        executeSQL($conn, $sql, 'issssssi', $user_id, $username, $email, $password, $gender, $birth_date, $create_date, $admin);
        header('Location:../controlpanel.php#create-panel');
    }

    mysqli_close($conn);
