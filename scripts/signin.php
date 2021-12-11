<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planta - Sign in</title>
    <link rel='stylesheet' href="../stylesheets/main.css">
    <link rel="stylesheet" href="../remixIcons/remixicon.css">
    <link rel='stylesheet' href="../stylesheets/signin.css">
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
                <input type="email" name="email" id="" class="box" placeholder="Enter your email ">
            </div>
            <div>
                <span>Password</span>
                <input type="password" name="password" id=" " class="box" placeholder="Enter your password ">
            </div>
            <input type="submit" value="Sign in" class="btn">
            <p>Don't have account? <a href="signup.php">Create one</a></p>
        </form>
    </div>
</body>
</html>