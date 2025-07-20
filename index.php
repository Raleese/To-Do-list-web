<?php
    require 'elements/head.html.php'; 
    require 'elements/input.php';
    require 'db.php';

    //$id = $_GET['id'];

    $config = require 'config.php';
    $db = new Database($config['database']);

    // ADDING and DELETING
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Delete item if delete_id is set
        if (!empty($_POST['delete_id'])) {
            $db->query('DELETE FROM item WHERE id = :id', ['id' => $_POST['delete_id']]);
        }
        // Add new item
        elseif (!empty($_POST['text'])) {
            $db->query('INSERT INTO item (text) VALUES (:text)', ['text' => $_POST['text']]);
        }
        
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    }

    $query = "SELECT * FROM item"; // WHERE id=?";
    $items = $db->query($query)->fetchAll(); //$items = $db->query($query, [$id])->fetchAll();

    foreach ($items as $item){
        $task = $item['text'];
        $id = $item['id'];
        require 'elements/to_do_box.php';
    }

    require 'elements/tail.html.php';
?>
