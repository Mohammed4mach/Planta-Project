<?php
    setcookie('planta_user_id', '', time() - 1, '/');
    header('Location:../index.php');