<?php
    $tasks = [
        "Clean the room",
        "Take out the trash",
        "test",
        "another one",
        "enough"
    ];
?>
    <?php
        require 'elements/head.php'; 
        require 'elements/add.php';

        foreach ($tasks as $task){
            require 'elements/to_do_box.php';
        }
        /*require 'db.php';

        $id = $_GET['id'];

        $config = require 'config.php';
        $db = new Database($config['database']);
        $query = "SELECT * FROM item WHERE id=?";
        $items = $db->query($query, [$id])->fetchAll();

        echo "<pre>";
        var_dump($items);
        echo "</pre>";*/
    ?>
    <script src="functions/buttons.js"></script>
</body>
</html>