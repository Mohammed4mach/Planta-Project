<?php
    require_once '../database.php';
    require_once '../functionality.php';

    if(isset($_POST['title']))
    {
        $article_id = (int)sanInput($_POST['article_id']);
        $title = sanInput($_POST['title']);
        $content = sanInput($_POST['content']);
        $plant_id = (int)sanInput($_POST['plant_id']);
        $create_date = date('Y:m:d H:i:s', time());

        $sql = "UPDATE articles SET title = ?, content = ?, plant_id = ? WHERE article_id = ?";
        executeSQL($conn, $sql, 'ssii', $title, $content, $plant_id, $article_id);
        header('Location:../controlpanel.php#update-panel');
    }

    mysqli_close($conn);
