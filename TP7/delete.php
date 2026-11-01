<?php
require_once "config.php" ;
if (isset($_GET["id"]))
{
    $id = $_GET["id"];

    try 
    {
        $stmt = $pdo->prepare("delete from users where id = ?");
        $stmt->execute([$id]);
        header("Location: index.php?deleted=1");
        exit();
    } 
    catch (\PDOException $e) 
    {
        exit("Database Error: " . $e->getMessage());
    }
}   
else 
{
    header("Location: index.php");
    exit();
}
?>