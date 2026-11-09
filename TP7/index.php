<?php
$users = [];
$errorMessage = null;

try {
    require_once "config.php";
    $stmt = $pdo->query("SELECT id, cin, full_name, tel, email, birth FROM users ORDER BY id DESC");
    $users = $stmt->fetchAll();
} catch (Throwable $e) {
    error_log("Unable to load users: " . $e->getMessage());
    $errorMessage = "Users could not be loaded. Please try again later.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="index.css"/>
</head>
<body>
    <?php if ($errorMessage !== null): ?>
        <div class="message error"><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?></div>
    <?php elseif (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="message success">User added successfully!</div>
    <?php elseif (isset($_GET['updated']) && $_GET['updated'] == 1): ?>
        <div class="message success">User updated successfully!</div>
    <?php elseif (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
        <div class="message success">User deleted successfully!</div>
    <?php endif; ?>

    <div class="add-div">
        <h1>Users List</h1> 
        <a href="add.php" class="add-user-link">
            Add User
        </a>
    </div>  

    <table>
        <thead>
            <tr>
                <th>CIN</th>
                <th>Full Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($users)): ?>
            <tr><td colspan="3" style="text-align: center;">No users found yet.</td></tr>
        <?php else: ?>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['cin'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="action">
                        <a href="show.php?id=<?= (int) $user['id'] ?>" class="show">Show</a>
                        <a href="modify.php?id=<?= (int) $user['id'] ?>" class="modify">Modify</a>
                        <a href="delete.php?id=<?= (int) $user['id'] ?>" class="delete">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <section class="chart-card">
        <h2>CIN and birth year</h2>
        <p class="muted">Each point represents one registered user.</p>
        <img src="chart.php" alt="Chart showing CIN and birth year">
    </section>

</body>
</html>