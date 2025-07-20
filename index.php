<?php
    require 'elements/head.html.php'; 
    require 'elements/input.php';
    require 'db.php';

    //$id = $_GET['id'];

    $config = require 'config.php';
    $db = new Database($config['database']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $text = trim($_POST['text'] ?? '');
        if ($text !== '') {
            $db->query('INSERT INTO item (text) VALUES (:text)', ['text' => $_POST['text']]);
        }
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    }

    $query = "SELECT * FROM item"; // WHERE id=?";
    $items = $db->query($query)->fetchAll(); //$items = $db->query($query, [$id])->fetchAll();

    foreach ($items as $item){
        $task = $item['text'];
        require 'elements/to_do_box.php';
    }

    require 'elements/tail.html.php';

    //echo "<pre>";
    //var_dump($_POST);
    //echo "</pre>";
    //die();
?>
