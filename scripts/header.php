    <div class="header-1">
        <div class="share">
            <span>Follow Us :</span>
            <a href='#'><i class='fab fa-facebook-f'></i></a>
            <a href='#'><i class='fab fa-twitter'></i></a>
            <a href='#'><i class='fab fa-instagram'></i></a>
            <a href='#'><i class='fab fa-linkedin'></i></a>
        </div>
        <?php
            if(isset($_COOKIE['planta_user_id']))
            {
                echo '
                <div class="logout">
                    <a href="logout.php">Log out</a>
                </div>';
            }
        ?>
    </div>

    <div class=" header-2">
        <a href="../index.php" class="logo"><i class="ri-leaf-line"></i> Planta</a>

        <form action="search.php" method="post" class="search-bar-container">
            <input type="search" name="search" id="search-bar" placeholder="search here...">
            <label for ="search-submit"><i class="fas fa-search"></i></label>
            <input type="submit" id="search-submit">
        </form>
    </div>