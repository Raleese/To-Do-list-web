<?php
    $tasks = [
        "Clean the room",
        "Take out the trash",
        "test",
        "another one",
        "enough"
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do</title>
</head>
<body>
    <h2>TO-DO List</h2>
    <?php 
        require 'elements/add.php';
        foreach ($tasks as $task){
            require 'elements/to_do_box.php';
        }
        require 'db.php';

        $config = require 'config.php';

        $db = new Database($config);
        $items = $db->query("SELECT * FROM item")->fetchAll();
        echo "<pre>";
        var_dump($items);
        echo "</pre>";
    ?>
</body>
</html>