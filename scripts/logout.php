<?php
    setcookie('plant_user_id', '', time() - 1, '/');
    header('Location:../index.php');