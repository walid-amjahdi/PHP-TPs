<?php require 'auth.php'; requireLogin(); $user = $_SESSION['utilisateur']; ?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><title>Accueil</title><link rel="stylesheet" href="style.css"></head><body><main>
<nav><a href="accueil.php">Accueil</a><a href="informations.php">Mes informations</a><a href="logout.php">Déconnexion</a></nav>
<h1>Bienvenue <?= e($user['prenom']) ?></h1>
<p>Cette page récupère le prénom depuis <code>$_SESSION['utilisateur']</code>. La session permet de conserver les données après la connexion.</p>
<p><a href="informations.php">Afficher mes informations et modifier ma langue</a></p>
</main></body></html>
