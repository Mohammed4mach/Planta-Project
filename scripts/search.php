<?php
    require_once 'database.php';
    require_once 'functionality.php';

    if(isset($_POST['search']))
    {
        $search_for = '%' . sanInput($_POST['search']) . '%';

        $sql = "SELECT plant_id, plant_name, img_path FROM plants WHERE plant_name LIKE ?";

        $rows = executeSQL($conn, $sql, 's', $search_for);
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/leaf-line.png">
    <link rel='stylesheet' href="../stylesheets/main.css">
    <link rel='stylesheet' href='../fontawesome/css/all.min.css'>
    <link rel="stylesheet" href="../remixIcons/remixicon.css">
    <link rel="stylesheet" href="../stylesheets/search.css">
    <title>Planta - Search</title>
</head>
<body>

    <div class="header-1">
        <div class="share">
            <span>Follow Us :</span>
            <a href='#'><i class='fab fa-facebook-f'></i></a>
            <a href='#'><i class='fab fa-twitter'></i></a>
            <a href='#'><i class='fab fa-instagram'></i></a>
            <a href='#'><i class='fab fa-linkedin'></i></a>
        </div>
    </div>

    <div class=" header-2">
        <a href="../index.php" class="logo"><i class="ri-leaf-line"></i> Planta</a>

        <form action="search.php" method="post" class="search-bar-container">
            <input type="search" name="search" id="search-bar" placeholder="search here...">
            <label for ="search-submit"><i class="fas fa-search"></i></label>
            <input type="submit" id="search-submit">
        </form>
    </div>

    <div class="header-3">
        <nav class="navbar">
            <a href="#home"> Home</a>
            <a href="#category"> Category</a>
            <a href="#fertilize"> Fertilize</a>
            <a href="#contact"> Contact</a>
        </nav>
        <div class="icons">
            <a href="signin.php"><i class ="fas fa-user"></i></a>
        </div>
    </div>

    <div class="container">
        <!-- If there no result -->
        <?php
            if(isset($_POST['search']))
            {
                if(!count($rows))
                {
                    echo "<div id='no-result'>No results found for '". trim($search_for, '%') . "'</div>";
                }
                else
                {
                    foreach($rows as $row)
                    {
                        echo
                            "
                                <div class='plant'>
                                    <img src='" . $row['img_path'] . "' alt='" . $row['plant_name'] . "'>
                                    <a href='plant.php?plant_id=" . $row['plant_id'] . "'>" . $row['plant_name'] . "</a>
                                    <form action='add_plant.php' method='post'>
                                        <input type='number' value='" . $row['plant_id'] . "' disabled>
                                        <input class='btn' type='submit' value='Add'>
                                    </form>
                                </div>
                            ";
                    }
                }
            }
        ?>
    </div>
</body>
</html>



    <?php

    // Close db Connection
        mysqli_close($conn);

    ?>