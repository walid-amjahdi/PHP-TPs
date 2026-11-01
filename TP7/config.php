<link rel="stylesheet" href="index.css"/>


<?php

$dsn = "mysql:host=localhost;dbname=php_crud;charset=utf8mb4";

try {
    $pdo = new PDO($dsn,"root","walid");
    echo "<h4 class=\"success\">Connected Successfully to DB</h4> <br>";
}
catch (\PDOExeption $e)
{
    echo "<h4 class=\"error\">Error while connecting to DB</h4> <br>";
    echo "<h4 class=\"error\">Message Error : {$e->getMessage()}</h4> <br>";
}

?>

