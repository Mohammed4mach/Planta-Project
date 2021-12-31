<?php

    require_once 'database.php';
    require_once 'functionality.php';

    if(!isset($_COOKIE['planta_user_id']))
    {
        header('Location:signin.php');
        exit();
    }

    // Fetch admin data
    $sql = "SELECT img_path, admin FROM users WHERE user_id = ?";
    $admin_id = sanInput($_COOKIE['planta_user_id']);
    $row = executeSQL($conn, $sql, 'i', $admin_id);
    $is_admin = $row[0]['admin'];
    // Set user-img placeholder
    if(is_null($row[0]['img_path']))
        $admin_img_path = '../uploads/users-img/user-icon-placeholder.png';
    else
        $admin_img_path = $row[0]['img_path'];

    if(!$is_admin)
    {
        header('Location:profile.php');
        exit();
    }


    // Fetch users data
    $sql = "SELECT * FROM users ORDER BY admin DESC";
    $users_rows = executeSQL($conn, $sql);

    // Fetch plants data
    $sql = "SELECT * FROM plants ORDER BY plant_name ASC";
    $plants_rows = executeSQL($conn, $sql);

    // Fetch articles data
    $sql = "SELECT * FROM articles ORDER BY title ASC";
    $articles_rows = executeSQL($conn, $sql);

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../remixIcons/remixicon.css">
    <link rel="stylesheet" href="../stylesheets/main.css">
    <link rel="stylesheet" href="../stylesheets/controlPanel.css">
    <link rel="icon" href="../assets/images/leaf-line.png">

    <title>Planta - Admin Panel</title>
</head>
<body>
    <?php
        require_once("header.php");
    ?>
    <header>
        <input type="checkbox" id="toggle-nav" checked>
        <label for="toggle-nav" role="button" onclick="toggleNav()">
            <span class="fas fa-bars menu"></span>
        </label>
        <div class="logo">
            <h2><i class="ri-leaf-line"></i> Planta</h2>
            <span> Admin Panel</span>
        </div>
        <div class="user-prime">
            <a href="profile.php"><img src="<?php echo $admin_img_path; ?>" alt="User image"></a><!-- Admin info -->
        </div>
    </header>

    <main>
        <nav>
            <ul>
                <a href="#users-panel"><span class="ri-user-5-fill"></span><li id="li-user">Users</li></a>
                <a href="#plants-panel"><span class="ri-plant-fill"></span><li id="li-plant">Plants</li></a>
                <a href="#articles-panel"><span class="ri-article-fill"></span><li id="li-article">Articles</li></a>
                <a href="#create-panel"><span class="ri-user-add-fill"></span><li id="li-create">Create</li></a>
                <a href="#update-panel"><span class="fas fa-edit"></span><li id="li-create">Update</li></a>
                <a href="#delete-panel"><span class="ri-delete-bin-5-fill"></span><li id="li-delete">Delete</li></a>
            </ul>
        </nav>

        <article>
            <section id="users-panel">
                <h2>Users</h2>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th class="fas fa-star fav"></th>
                    </thead>
                    <tbody>
                        <?php
                        // Print all users data
                        if(count($users_rows))
                        {
                            foreach($users_rows as $row)
                            {
                                // Fetch number of user plant
                                $sql = "SELECT plant_id FROM interests WHERE user_id = " . $row['user_id'];
                                $user_plants_number = count(executeSQL($conn, $sql));

                                echo "<tr>";
                                echo "<th>" . $row['user_id'] . "</th>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['gender'] . "</td>";
                                echo "<td>" . calcAge($row['birth_date']) . "</td>";
                                echo "<td>$user_plants_number</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </section>

            <section id="plants-panel">
                <h2>Plants</h2>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Articles</th>
                        <th>Interested Users</th>
                    </thead>
                    <tbody>
                        <?php
                        // Print all plants data
                        if(count($plants_rows))
                        {
                            foreach($plants_rows as $row)
                            {
                                // Fetch number of interested users
                                $sql = "SELECT user_id FROM interests WHERE plant_id = " . $row['plant_id'];
                                $interested_users_number = count(executeSQL($conn, $sql));

                                echo "<tr>";
                                echo "<th>" . $row['plant_id'] . "</th>";
                                echo "<td>" . $row['plant_name'] . "</td>";
                                echo "<td>-</td>";
                                echo "<td>$interested_users_number</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </section>

            <section id="articles-panel">
                <h2>Articles</h2>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Title</th>
                        <th>About</th>
                        <th>Likes</th>
                    </thead>
                    <tbody>
                        <?php
                        // Print all plants data
                        if(count($articles_rows))
                        {
                            foreach($articles_rows as $row)
                            {
                                echo "<tr>";
                                echo "<th>" . $row['article_id'] . "</th>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>-</td>";
                                echo "<td>-</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </section>

            <section id="create-panel">
                <div class="subsection">
                    <!-- <div class="class">
                        <select>
                            <option value="u" onselect="">User</option>
                            <option value="p">Plant</option>
                            <option value="a">Article</option>
                        </select>
                    </div> -->
                    <div id="user-create">
                        <h2>Create User</h2>
                        <form action="CPanel_scripts/create-user.php" name="create-user" method="post">
                            <input type="text" name="username" placeholder="Username" pattern="\w*[_-]*" required>
                            <input type="email" name="email" placeholder="E-mail" required>
                            <input type="password" name="password" placeholder="Password" minlength="3" maxlength="12" pattern="\w*[*.!@$%^&,.?/~_+-=|]+" required>
                            <input type="text" name="gender" placeholder="Gender" maxlength="1" pattern="[FM]" required>
                            <input type="date" name="birth_date" required>
                            <input type="number" name="admin" placeholder="Admin" min="0" max="1" required>
                            <input type="submit" value="Create">
                        </form>
                    </div>

                    <div id="plant-create">
                        <h2>Create Plant</h2>
                        <form action="CPanel_scripts/create-plant.php" name="create-plant" method="post">
                            <input type="text" name="plant_name" placeholder="Plant Name" required>
                            <input type="text" name="img_path" placeholder="Image Path">
                            <textarea name="info" rows="3" cols="30" placeholder="Information" required></textarea>
                            <input type="submit" value="Create">
                        </form>
                    </div>

                    <div id="article-create">
                        <h2>Create Article</h2>
                        <form action="CPanel_scripts/create-article.php" name="create-article" method="post">
                            <input type="text" name="title" placeholder="Title" required>
                            <input type="text" name="img_path" placeholder="Image Path">
                            <textarea name="content" rows="3" cols="30" placeholder="Content" required></textarea>
                            <input type="number" name="plant_id" placeholder="Plant_ID" max="999999999" min="1" required>
                            <input type="submit" value="Create">
                        </form>
                    </div>
                </div>
            </section>

            <section id="update-panel">
                <div class="subsection">
                    <!-- <div class="class">
                        <a href="#user-update">User</a>
                        <a href="#plant-update">Plant</a>
                        <a href="#article-update">Article</a>
                    </div> -->
                    <div id="user-update">
                        <h2>Update User</h2>
                        <form action="CPanel_scripts/update-user.php" name="update-user" method="post">
                            <input type="number" name="user_id" placeholder="ID" max="999999999" min="1" required>
                            <input type="text" name="username" placeholder="Username" pattern="\w*[_-]*" required>
                            <input type="email" name="email" placeholder="E-mail" required>
                            <input type="password" name="password" placeholder="Password" minlength="3" maxlength="12" pattern="\w*[*.!@$%^&,.?/~_+-=|]+" required>
                            <input type="text" name="gender" placeholder="Gender" maxlength="1" pattern="[FM]" required>
                            <input type="date" name="birth_date" required>
                            <input type="number" name="admin" placeholder="Admin" min="0" max="1" required>
                            <input type="submit" value="Update">
                        </form>
                    </div>

                    <div id="plant-update">
                        <h2>Update Plant</h2>
                        <form action="CPanel_scripts/update-plant.php" name="update-plant" method="post">
                            <input type="number" name="plant_id" placeholder="ID" max="999999999" min="1" required>
                            <input type="text" name="plant_name" placeholder="Plant Name" required>
                            <input type="text" name="img_path" placeholder="Image Path">
                            <textarea name="info" rows="3" cols="30" placeholder="Information" required></textarea>
                            <input type="submit" value="Update">
                        </form>
                    </div>

                    <div id="article-update">
                        <h2>Update Article</h2>
                        <form action="CPanel_scripts/update-article.php" name="update-article" method="post">
                            <input type="number" name="article_id" placeholder="ID" max="999999999" min="1" required>
                            <input type="text" name="title" placeholder="Title" required>
                            <input type="text" name="img_path" placeholder="Image Path">
                            <textarea name="content" rows="3" cols="30" placeholder="Content" required></textarea>
                            <input type="number" name="plant_id" placeholder="Plant_ID" max="999999999" min="1" required>
                            <input type="submit" value="Update">
                        </form>
                    </div>
                </div>
            </section>

            <section id="delete-panel">
                    <div class="subsection">
            <!--    <div class="class">
                        <a href="#user-delete">User</a>
                        <a href="#plant-delete">Plant</a>
                        <a href="#article-delete">Article</a>
                    </div> -->
                    <div id="user-delete">
                        <h2>Delete User</h2>
                        <form action="CPanel_scripts/delete-user.php" name="delete-user" method="post">
                            <input type="number" name="user_id" placeholder="ID" max="999999999" min="1" required>
                            <input type="submit" value="Delete">
                        </form>
                    </div>

                    <div id="plant-delete">
                        <h2>Delete Plant</h2>
                        <form action="CPanel_scripts/delete-plant.php" name="delete-plant" method="post">
                            <input type="number" name="plant_id" placeholder="ID" max="999999999" min="1" required>
                            <input type="submit" value="Delete">
                        </form>
                    </div>

                    <div id="article-delete">
                        <h2>Delete Article</h2>
                        <form action="CPanel_scripts/delete-article.php" name="delete-article" method="post">
                            <input type="number" name="article_id" placeholder="ID" max="999999999" min="1" required>
                            <input type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </section>
        </article>
    </main>

    <script src="toggle-nav.js"></script>
    <!-- <script src="highlight_active_link.js"></script> -->
</body>
</html>


<?php

// Close db Connection
    mysqli_close($conn);

?>