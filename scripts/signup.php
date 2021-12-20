<?php

/*

    Your Tasks are:
- Take Inputs from user then sanitize it using sanInput()
- Authentication:
   Using executeSQL($connection, $sql, $type, $parameters) function:
    * Check if there is email in 'plantadb' equals to input
    * If there is, echo 'There is an email with that address'
    * If not, Check if the password != confirm_password
    * If true, echo 'The password is not identical with confirm password'
    * If not, generate user_id using genId($length), where $length = 9
    * Check if there is user id with same value in 'plantadb'
    * If true,  generate another one
- Encrypt password using password_hash()
- Define variable refer to date of creation
- Insert all data into users table, where columns is (user_id, username, email, password, gender, birthdate, create_date)
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
    <title>Planta - Signup</title>
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
        <form action="signup.php" method="post">
            <h3> Sign up </h3>
            <div>
                <span>Username</span>
                <input type="text" name="username"  class="box" placeholder="Enter a username" required pattern="\w*[_-]*">
            </div>
            <div>
                <span>Email</span>
                <input type="email" name="email"  class="box" placeholder="Enter your email" required>
            </div>
            <div>
                <span>Password</span>
                <input type="password" name="password" class="box" placeholder="Enter your password" required minlength="3" maxlength="12" pattern="\w*[*.!@$%^&,.?/~_+-=|]+"><br>
                <input type="password" name="confirm_password" class="box" placeholder="Confirm your password" required minlength="3" maxlength="12" pattern="\w*[*.!@$%^&,.?/~_+-=|]+">
            </div>
            <div>
                <span>Date of birth</span>
                <!-- date of birth -->
                <div class="birthDate">
                    <input type="date" name="birth_date">
                </div>
            </div>
            <div class="gender">
                    <!-- Gender -->
                    <span>Gender</span>
                    <div class="male">
                        <label><i class="fa fa-male"></i> Male</label>
                        <input name="gender" type="radio" value="M" required >
                    </div>
                    <div class="fe male">
                        <label><i class="fa fa-female"></i> Female</label>
                        <input name="gender" type="radio" value="F" required>
                    </div>
                    
                    <div class="clear"></div>

            </div>
            <input type="submit" value="sign Up" class="btn">
        </form>
    </div>
    <script src="change_logo_path.js"></script>
</body>
</html>

<?php

// Close db Connection
    mysqli_close($conn);

?>