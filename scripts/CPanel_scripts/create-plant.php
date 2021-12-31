<?php
    require_once '../database.php';
    require_once '../functionality.php';

    if(isset($_POST['plant_name']))
    {
        $plant_id = genId(9);
        $plant_name = sanInput($_POST['plant_name']);
        $info = sanInput($_POST['info']);

        // Check for identical ID        
        $sql = "SELECT plant_id FROM plants WHERE plant_id = $plant_id";
        while(executeSQL($conn, $sql))
        {
            $plant_id = genId(9);
        }

        $sql = "INSERT INTO plants (plant_id, plant_name, info) VALUES (?, ?, ?)";
        executeSQL($conn, $sql, 'iss', $plant_id, $plant_name, $info);
        header('Location:../controlpanel.php#create-panel');
    }

    mysqli_close($conn);
