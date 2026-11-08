<link rel="stylesheet" href="index.css"/>


<?php

$dsn = "mysql:host=localhost;dbname=php_crud;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, "root", "walid", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    throw new RuntimeException("Unable to connect to the database.", 0, $e);
}
