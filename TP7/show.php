<?php
try {
    require_once "config.php";
} catch (Throwable $e) {
    error_log("Show page database error: " . $e->getMessage());
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details - <?= htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="index.css"/>
</head>
<body>
    <div class="container">
        <h1>User Information</h1>
        
        <div class="user-details-card">
            <p><strong>CIN:</strong> <?= htmlspecialchars($user['cin'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Full Name:</strong> <?= htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Tel:</strong> <?= htmlspecialchars($user['tel'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Birthdate:</strong> <?= htmlspecialchars($user['birth'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Grade:</strong> <?= htmlspecialchars($user['grade'], ENT_QUOTES, 'UTF-8') ?> / 20</p>
            <p><strong>Honor:</strong> <?= htmlspecialchars($user['honor'] ?? 'None', ENT_QUOTES, 'UTF-8') ?></p>
        </div>

        <div class="actions" style="margin-top: 20px;display: flex;gap: 20px">
            <a href="modify.php?id=<?= (int) $user['id'] ?>" class="modify">Modify</a>
            <a href="index.php" class="back-link">Back to List</a>
        </div>
    </div>
</body>
</html>