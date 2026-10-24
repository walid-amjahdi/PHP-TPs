<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_COOKIE['visiteur'])) {
    setcookie('visiteur', $_SESSION['prenom'], time() + (86400 * 30));
}
$cookie_val = $_COOKIE['visiteur'] ?? $_SESSION['prenom'];
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Informations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <nav>
        <a href="accueil.php">Accueil</a>
        <a href="informations.php">Mes informations</a>
        <a href="logout.php">Déconnexion</a>
    </nav>
    
    <h1>Mes informations</h1>
    <div class="box">
        <strong>Login :</strong> <?= $_SESSION['login'] ?><br>
        <strong>Nom :</strong> <?= $_SESSION['nom'] ?><br>
        <strong>Prénom :</strong> <?= $_SESSION['prenom'] ?><br>
        <strong>E-mail :</strong> <?= $_SESSION['email'] ?>
    </div>

    <h2>Cookie</h2>
    <p>Valeur lue depuis le cookie : <strong><?= htmlspecialchars($cookie_val) ?></strong></p>
</main>
</body>
</html>