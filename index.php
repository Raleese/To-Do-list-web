<?php
    require 'elements/head.html.php'; 
    require 'elements/input.php';
    require 'db.php';

    //$id = $_GET['id'];

    $config = require 'config.php';
    $db = new Database($config['database']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Delete item if delete_id is set
        if (!empty($_POST['delete_id'])) {
            $db->query('DELETE FROM item WHERE id = :id', ['id' => $_POST['delete_id']]);
        }
        // Add new item
        elseif (!empty($_POST['text'])) {
            $db->query('INSERT INTO item (text) VALUES (:text)', ['text' => $_POST['text']]);
        }
        // Mark item as complete
        elseif (!empty($_POST['completed_id'])){
            $db->query('UPDATE item SET completed = 1 - completed WHERE id = :id', ['id' => $_POST['completed_id']]);
        }

        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    }

    $query = "SELECT * FROM item"; // WHERE id=?";
    $items = $db->query($query)->fetchAll(); //$items = $db->query($query, [$id])->fetchAll(); ?>

    <script src="functions/buttons.js"></script>

<?php

    foreach ($items as $item){
        $task = $item['text'];
        $id = $item['id'];
        $completed = $item['completed'];
        require 'elements/to_do_box.php';
        if ($completed === 1){
            echo "<script>crossText($id);</script>";
        }
    }

    require 'elements/tail.html.php';
?>
