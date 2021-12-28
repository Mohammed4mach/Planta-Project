<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Planta</title>

        <link rel="icon" href="assets/images/leaf-line.png">
        <link rel="stylesheet" href="stylesheets/swiper-bundle.min.css"/>
        <link rel='stylesheet' href="stylesheets/main.css">
        <link rel='stylesheet' href='fontawesome/css/all.min.css'>
        <link rel="stylesheet" href="remixIcons/remixicon.css">

        <script src="fontawesome/js/all.min.js"></script>
    </head>
    <body>
    <?php 
        require_once("scripts/header.php");
    ?>

    <div class="header-3">
        <nav class="navbar">
            <a href="index.php"> Home</a>
            <a href="#category"> Category</a>
            <a href="#fertilize"> Fertilize</a>
            <a href="#contact"> Contact</a>
        </nav>
        <div class="icons">
            <a href="scripts/signin.php"><i class ="fas fa-user"></i></a>
        </div>
    </div>

    <!-- start-->
    <section id="home" class="home">
        <div class="row">
            <div class="content">
                <h3>Upto 70% Off</h3>
                <p>Decorate Your Home Now , Make Your Home Green </p>
                <a href="#" class="btn1">Shop Now</a>
            </div>

            <div class="swiper plants-slider">
                <div class="swiper-wrapper">
                    <a href="#" class="swiper-slide"><img src="assets/images/cat2.jpg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="assets/images/cat3.jpg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="assets/images/cat4.jpg" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="assets/images/cat1.jpg" alt=""></a>
                </div>
                <img src="assets/images/stand.png" class="stand" alt="">
            </div>
        </div>

    </section>

    <!--end -->

        <script src="scripts/change_logo_path.js"></script>
        <script src="scripts/swiper-bundle.min.js"></script>
        <script src="scripts/img-swiper.js"></script>
        
    </body>
</html>