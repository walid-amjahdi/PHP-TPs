<?php
require_once "config.php";
$stmt = $pdo->query("select * from users");
$users = $stmt->fetchAll();

if (isset($_GET['success']) && $_GET['success'] == 1): 
?>
    <h4 class="success">User added successfully!</h4>
<?php 
endif; 
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
    <div class="add-div">
        <h1>Users List</h1> 
        <a href="add.php" class="add-user-link">
            Add User
        </a>
    </div>  

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>CIN</th>
                <th>Full Name</th>
                <th>Tel</th>
                <th>Email</th>
                <th>Birthdate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($users)): ?>
            <tr><td colspan="7" style="text-align: center;">No users found yet.</td></tr>
        <?php else: ?>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= ($user['id']) ?></td>
                    <td><?= ($user['cin']) ?></td>
                    <td><?= ($user['full_name']) ?></td>
                    <td><?= ($user['tel']) ?></td>
                    <td><?= ($user['email']) ?></td>
                    <td><?= ($user['birth']) ?></td>
                    <td class="action">
                        <a href="modify.php?id=<?= $user['id'] ?>" class="modify">Modify</a>
                        <a href="delete.php?id=<?= $user['id'] ?>" class="delete">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>