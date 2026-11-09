<?php
try {
    require_once "config.php";
} catch (Throwable $e) {
    error_log("Modify page database error: " . $e->getMessage());
    exit("The database is currently unavailable.");
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    $formData = [];
    foreach ($_POST as $key => $value) 
    {
        $formData[$key] = trim($value);
    }
    
    $cin       = $formData["cin"] ?? '';
    $full_name = $formData["full_name"] ?? '';
    $tel       = $formData["tel"] ?? '';
    $email     = $formData["email"] ?? '';
    $birth     = $formData["birth"] ?? '';
    $grade    = $formData["grade"] ?? '';
    $honor    = $formData["honor"] ?? '';
    
    if (preg_match("/^[A-Z]{2}[0-9]{6}$/", $cin) == 0) 
    {
        exit("Invalid CIN format (e.g., AB123456)");
    }
    if (preg_match("/^[A-Za-z0-9.]+@[A-Za-z]+\.[a-z.]+$/", $email) == 0) 
    {
        exit("Invalid Email format");
    }
    if (preg_match("/^0[567]{1}[0-9]{8}$/", $tel) == 0) 
    {
        exit("Invalid Tel format (e.g., 0612345678)");
    }
    if (preg_match("/^(?:[0-9]|1[0-9]|20)$/",$grade))
    {
        exit("Invalid grade format (0-20)");
    }
    
    try 
    {
        $stmt = $pdo->prepare("UPDATE users SET cin = ?, full_name = ?, tel = ?, email = ?, birth = ?, grade = ?, honor = ? WHERE id = ?");
        $stmt->execute([$cin, $full_name, $tel, $email, $birth, $grade, $honor, $id]);
    
        header("Location: index.php?updated=1");
        exit();
    
    } catch (Throwable $e) {
        error_log("Unable to update user: " . $e->getMessage());
        exit("Unable to update the user. Please try again.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify User</title>
    <link rel="stylesheet" href="index.css"/>
</head>
<body>
    <h1>Modify User Infos</h1>
    <form method="POST">
        <label for="CIN">CIN :</label>
        <input type="text" name="cin" id="CIN" value="<?= htmlspecialchars($user['cin']) ?>" placeholder="AB123456" required>

        <label for="name">Full Name :</label>
        <input type="text" name="full_name" id="name" value="<?= htmlspecialchars($user['full_name']) ?>" required>

        <label for="tel">Tel :</label>
        <input type="text" name="tel" id="tel" value="<?= htmlspecialchars($user['tel']) ?>" placeholder="0612345678" required>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required>

        <label for="birth">Birthdate :</label>
        <input type="date" name="birth" id="birth" value="<?= htmlspecialchars($user['birth']) ?>" required>
        <br><br>
        <button class="update-user" type="submit" name="submit">Update User</button>
    </form>
</body>
</html>