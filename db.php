<?php
    class Database{
        public $connection;
        public function __construct($config, $user = 'root', $passw = 'titale'){
            $databaseName = $config['dbname'];
            $serverConfig = $config;
            unset($serverConfig['dbname']);

            $serverDsn = 'mysql:' . http_build_query($serverConfig, '', ';');
            $options = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            $serverConnection = new PDO($serverDsn, $user, $passw, $options);
            $serverConnection->exec(sprintf(
                'CREATE DATABASE IF NOT EXISTS `%s` CHARACTER SET %s COLLATE %s',
                str_replace('`', '``', $databaseName),
                $config['charset'],
                $config['charset'] . '_unicode_ci'
            ));

            $dsn = 'mysql:' . http_build_query($config, '', ';');
            $this->connection = new PDO($dsn, $user, $passw, $options);
            $this->connection->exec('CREATE TABLE IF NOT EXISTS item (
                id INT AUTO_INCREMENT PRIMARY KEY,
                text VARCHAR(50) NOT NULL,
                completed TINYINT(1) NOT NULL DEFAULT 0
            )');
        }

        public function query ($query, $params = []){
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;
        }
    }
?>