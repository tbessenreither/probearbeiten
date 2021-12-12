<?php

$config = require('config.php');

$pdo = new PDO('mysql:host='.$config['database']['hostname'].';dbname='.$config['database']['database'].'', $config['database']['username'], $config['database']['password']);

$statement = $pdo->prepare("SHOW VARIABLES;");
$statement->execute([]);
while ($row = $statement->fetch()) {
   var_dump($row);
}