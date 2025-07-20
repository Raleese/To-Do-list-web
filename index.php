<?php
    $tasks = [
        "Clean the room",
        "Take out the trash",
        "test"
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
    <?php require 'elements/add.php'; ?>
    <div class="boxes-container">
        <?php 
            foreach ($tasks as $task){
                require 'elements/to_do_box.php';
            }
        ?>
    </div>
</body>
</html>