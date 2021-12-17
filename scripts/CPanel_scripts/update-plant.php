<?php
    require_once '../database.php';
    require_once '../functionality.php';

    if(isset($_POST['plant_name']))
    {
        $plant_id = (int)sanInput($_POST['plant_id']);
        $plant_name = sanInput($_POST['plant_name']);
        $info = sanInput($_POST['info']);
        $sql = "UPDATE plants SET plant_name = ?, info = ? WHERE plant_id = ?";
        executeSQL($conn, $sql, 'ssi', $plant_name, $info, $plant_id);
        header('Location:../controlpanel.php#update-panel');
    }
?>