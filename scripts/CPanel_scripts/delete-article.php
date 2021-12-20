<?php
    require_once '../database.php';
    require_once '../functionality.php';

    if(isset($_POST['article_id']))
    {
        $article_id = (int)sanInput($_POST['article_id']);

        $sql = "DELETE FROM articles WHERE article_id = ?";
        executeSQL($conn, $sql, 'i', $article_id);
        header('Location:../controlpanel.php#delete-panel');        
    }
?>