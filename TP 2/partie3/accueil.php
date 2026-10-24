<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><title>Accueil</title><link rel="stylesheet" href="style.css"></head><body><main>
<nav><a href="accueil.php">Accueil</a><a href="informations.php">Mes informations</a><a href="logout.php">Déconnexion</a></nav>
<h1>Bienvenue <?= $_SESSION['prenom'] ?></h1>
<p>Le prénom vient de <code>$_SESSION['prenom']</code>. La session garde les informations après la connexion.</p>
<p><a href="informations.php">Afficher mes informations</a></p>
</main></body></html>
