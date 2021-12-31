<?php

  require_once('database.php');
  require_once('functionality.php');

  if(!isset($_COOKIE['planta_user_id']))
  {
    header('Location:signin.php');
    exit();
  }

  $user_id = sanInput($_COOKIE['planta_user_id']);

  // Fetch logged user data
  $sql = "SELECT username, email, img_path, admin FROM users WHERE user_id = ?";
  $user_data = executeSQL($conn, $sql, 'i', $user_id);
  $username = $user_data[0]['username'];
  $email = $user_data[0]['email'];
  $is_admin = $user_data[0]['admin'];
  // Set user-img placeholder
  if(is_null($user_data[0]['img_path']))
    $user_img_path = '../uploads/users-img/user-icon-placeholder.png';
  else
    $user_img_path = $user_data[0]['img_path'];


  // Fetch user plants ids
  $sql = "SELECT plant_id FROM interests WHERE user_id = $user_id";
  $rows = executeSQL($conn, $sql);

  $user_plants_ids = array();

  foreach($rows as $row)
  {
    array_push($user_plants_ids, $row['plant_id']);
  }

  $user_plants_number = count($user_plants_ids);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Planta - <?php echo $username; ?></title>
    <!-- external style -->
    <link rel="stylesheet" href="../stylesheets/main.css"/>
    <link rel='stylesheet' href='../fontawesome/css/all.min.css'>
    <link rel="stylesheet" href="../remixIcons/remixicon.css">
    <link rel="icon" href="../assets/images/leaf-line.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lobster+Two:ital@0;1&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lobster+Two:ital@0;1&family=Vidaloka&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../stylesheets/profile.css"/>


    <script src="../fontawesome/js/all.min.js"></script>
  </head>
  <body>

    <?php require_once('header.php'); ?>

    <div class="container">
        <div class="profil">
          <div class="profil-img-container">
            <img src="<?php echo $user_img_path; ?>"  class="profil-img">
            <div id="upload-img">
              <label for="file_upload"><i class="fas fa-camera"></i></label>
              <form action="update-img.php" method="post" enctype="multipart/form-data">
                <input type="file" name="user_image" id="file_upload" required>
                <input type="submit" value="Upload">
              </form>
            </div>
          </div>
          <div class="profil-name"><?php echo $username; ?></div>
          <div class="profil-detalis">
            <span class="num"><?php echo $user_plants_number; ?></span>
          </div>
          <div class="number-of-plants">
          Plants
          </div>
          <div class="mail">
             <?php echo $email; ?>
          </div>
          <?php
            if($is_admin)
            {
              echo '
                <div class="to_admin_panel">
                  <a href="controlpanel.php"><i class="fas fa-user-tie"></i></a>
                </div>';
            }
          ?>
        </div>

      <!-- Plants div -->

    <div class="plants-parent">
      <h2>My Plants</h2>
      <div class="my-plants">
        <?php
          if(!count($user_plants_ids))
          {
            echo "<div id='no-result'>You have no plants</div>";
          }
          foreach($user_plants_ids as $plant_id)
          {
            $sql = "SELECT plant_name, img_path FROM plants WHERE plant_id = $plant_id";
            $row = executeSQL($conn, $sql);
            $plant_name = $row[0]['plant_name'];
            $plant_img_path = $row[0]['img_path'];

            echo
                "
                          <div class='plant'>
                            <img src='$plant_img_path' alt='plant'>
                            <form action='remove_plant.php' method='get'>
                              <label class='id_label' for='$plant_id'>$plant_name</label><br>
                              <input type='number' name='plant_id' value='$plant_id' class='plant_id' readonly>
                              <input formaction='plant.php' type='submit' class='labeled_submit' id='$plant_id'>
                              <div class='remove_btn' role='button'>
                                <input type='submit' class='btn' value='remove'>
                              </div>
                            </form>
                          </div>
                ";
          }
        ?> 
      </div>
    </div>
    </div>
  </body>
</html>



<?php

// Close db Connection
    mysqli_close($conn);

?>