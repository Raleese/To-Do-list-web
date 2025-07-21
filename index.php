<?php
    require 'elements/head.html.php'; 
    require 'elements/input.php';
    require 'db.php';

    $config = require 'config.php';
    $db = new Database($config['database']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Add new item
        if (!empty($_POST['text'])) {
            if (trim($_POST['text']) != '')
                $db->query('INSERT INTO item (text) VALUES (:text)', ['text' => $_POST['text']]);
        }
        // Delete item if delete_id is set
        elseif (!empty($_POST['delete_id'])) {
            $db->query('DELETE FROM item WHERE id = :id', ['id' => $_POST['delete_id']]);
        }
        // Mark item as complete
        elseif (!empty($_POST['completed_id'])){
            $db->query('UPDATE item SET completed = 1 - completed WHERE id = :id', ['id' => $_POST['completed_id']]);
        }

        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    }

    $query = "SELECT * FROM item";
    $items = $db->query($query)->fetchAll(); ?>

    <script src="functions/buttons.js"></script>

<?php

    echo '<div class="todo-list">';
        foreach ($items as $item){
            $task = $item['text'];
            $id = $item['id'];
            $completed = $item['completed'];
            require 'elements/to_do_box.php';
            if ($completed === 1){
                echo "<script>crossText($id);</script>";
            }
        }
    echo '</div>';
    require 'elements/tail.html.php';
?>
