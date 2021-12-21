<?php
    require_once '../database.php';
    require_once '../functionality.php';

    if(isset($_POST['title']))
    {
        $article_id = genId(9);
        $title = sanInput($_POST['title']); 
        $content = sanInput($_POST['content']);
        $plant_id = (int)sanInput($_POST['plant_id']);
        $create_date = date('Y:m:d H:i:s', time());

        // Check for identical ID        
        $sql = "SELECT article_id FROM articles WHERE article_id = $article_id";
        while(executeSQL($conn, $sql))
        {
            $article_id = genId(9);
        }

        $sql = "INSERT INTO articles (article_id, title, content, plant_id, create_date) VALUES (?, ?, ?, ?, ?)";
        executeSQL($conn, $sql, 'issis', $article_id, $title, $content, $plant_id, $create_date);
        header('Location:../controlpanel.php#create-panel');
    }
?>