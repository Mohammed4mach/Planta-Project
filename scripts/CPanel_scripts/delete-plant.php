<?php

    require_once '../database.php';
    require_once '../functionality.php';

    if(isset($_POST['plant_id']))
    {
        $plant_id = (int)sanInput($_POST['plant_id']);

        $sql = "DELETE FROM plants WHERE plant_id = ?";
        executeSQL($conn, $sql, 'i', $plant_id);
        header('Location:../controlpanel.php#delete-panel');
    }

    mysqli_close($conn);
