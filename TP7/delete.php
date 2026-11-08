<?php
try {
    require_once "config.php";
} catch (Throwable $e) {
    error_log("Delete page database error: " . $e->getMessage());
    exit("The database is currently unavailable.");
}
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
    catch (Throwable $e) {
        error_log("Unable to delete user: " . $e->getMessage());
        exit("Unable to delete the user. Please try again.");
    }
}   
else 
{
    header("Location: index.php");
    exit();
}
?>