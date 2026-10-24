<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['langue'])) {
    setcookie('langue', $_POST['langue'], time() + 60 * 60 * 24 * 30);
    $langue = $_POST['langue'];
} else if (isset($_COOKIE['langue'])) {
    $langue = $_COOKIE['langue'];
} else {
    $langue = 'fr';
}
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><title>Informations</title><link rel="stylesheet" href="style.css"></head><body><main>
<nav><a href="accueil.php">Accueil</a><a href="informations.php">Mes informations</a><a href="logout.php">Déconnexion</a></nav>
<h1>Mes informations</h1>
<div class="box"><strong>Login :</strong> <?= $_SESSION['login'] ?><br><strong>Nom :</strong> <?= $_SESSION['nom'] ?><br><strong>Prénom :</strong> <?= $_SESSION['prenom'] ?><br><strong>E-mail :</strong> <?= $_SESSION['email'] ?></div>
<h2>Préférence de langue (cookie)</h2><p>Langue actuelle : <strong><?= $langue ?></strong>. Ce choix est mémorisé pendant 30 jours.</p>
<form method="post"><label>Langue <select name="langue"><option value="fr">Français</option><option value="ar">العربية</option><option value="en">English</option></select></label><button>Enregistrer la préférence</button></form>
</main></body></html>
