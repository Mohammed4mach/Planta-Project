<?php

/*

    Your Tasks are:
- Take Inputs from user then sanitize it using sanInput()
- Authentication:
   Using executeSQL($connection, $sql, $type, $parameters) function:
    * Check if there is email in 'plantadb' equals to input
    * Retrieve the password in same row
    * Decrypt it
    * If there is an email check if the password in same row match the input by password_verify()
- If true, create cookies called 'planta_user_id' and store user_id in it with expire duration 2 weeks
- Then redirect user to home.php 
- Carefully test your work against 'plantadb'

$ After finishing each task put ✔ in front of it $

____For any help to use functions in functionality.php contact me____

With my best wishes...
    Muhammed Abdullsalam

*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planta - Sign in</title>
    <link rel="icon" href="../assets/images/leaf-line.png">
    <link rel='stylesheet' href="../stylesheets/main.css">
    <link rel="stylesheet" href="../stylesheets/signin.css">
    <link rel="stylesheet" href="../remixIcons/remixicon.css">
    <link rel='stylesheet' href='../fontawesome/css/all.min.css'>
</head>
<body>
    
    <?php
        require_once("header.php");
    ?>

    <div class="login-form-container">
        <form action="signin.php" method="post">
            <h3> Sign in </h3>
            <div>
                <span>Email</span>
                <input type="email" name="email" class="box" placeholder="Enter your email" required>
            </div>
            <div>
                <span>Password</span>
                <input type="password" name="password" class="box" placeholder="Enter your password" required minlength="3" maxlength="12" pattern="\w*[*.!@$%^&,.?/~_+-=|]+">
            </div>
            <input type="submit" value="Sign In" class="btn">
            <p>Don't have account? <a href="signup.php">Create one</a></p>
        </form>
    </div>
    <script src="change_logo_path.js"></script>
</body>
</html>

<?php

// Close db Connection
    mysqli_close($conn);

?>