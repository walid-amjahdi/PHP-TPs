<?php
$errorMessage = null;
try {
    require_once "config.php";
} catch (Throwable $e) {
    error_log("Add page database error: " . $e->getMessage());
    $errorMessage = "The database is currently unavailable.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="index.css"/>
</head>
<body>
    <?php if ($errorMessage !== null): ?>
        <div class="message error"><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?></div>
    <?php else: ?>
    <h1>Add User Infos</h1>
    <form method="POST">
        <label for="CIN">CIN :</label>
        <input type="text" name="cin" id="CIN" placeholder="AB123456" required>

        <label for="name">Full Name :</label>
        <input type="text" name="full_name" id="name" required>

        <label for="tel">Tel :</label>
        <input type="text" name="tel" id="tel" placeholder="0612345678" required>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>

        <label for="birth">Birthdate :</label>
        <input type="date" name="birth" id="birth" required>

        <label for="grade">Grade :</label>
        <input type="number" name="grade" id="grade" required>

        <br><br>
        <button class="add-user" type="submit" name="submit">Save User</button>
    </form>
    <?php endif; ?>
</body>
</html>

<?php

if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    $formData = [];
    foreach ($_POST as $key => $value) 
    {
        $formData[$key] = trim($value);
    }
    
    $cin      = $formData["cin"] ?? '';
    $full_name = $formData["full_name"] ?? '';
    $tel      = $formData["tel"] ?? '';
    $email    = $formData["email"] ?? '';
    $birth    = $formData["birth"] ?? '';
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
    if (preg_match("/^(?:[0-9]|1[0-9]|20)$/", $grade) == 0) 
    {
        exit("Invalid grade format (0-20 integers only)");
    }

    $grade_int = (int)$grade;
    $honor = '';
    if ($grade_int >= 16) {
        $honor = 'Très Bien';
    } elseif ($grade_int >= 14) {
        $honor = 'Bien';
    } elseif ($grade_int >= 12) {
        $honor = 'Assez Bien';
    } elseif ($grade_int >= 10) {
        $honor = 'Pass';
    } else {
        $honor = 'None';
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (cin, full_name, tel, email, birth, grade, honor) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$cin, $full_name, $tel, $email, $birth, $grade, $honor]);
    
        header("Location: index.php?success=1");
        exit();
    
    } catch (Throwable $e) {
        error_log("Unable to add user: " . $e->getMessage());
        exit("Unable to save the user. Please try again.");
    }
}
?>