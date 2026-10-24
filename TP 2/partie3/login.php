<?php
session_start();

if (isset($_POST['login']) && isset($_POST['mot_de_passe'])) {
    if ($_POST['login'] == 'etudiant' && $_POST['mot_de_passe'] == 'php2026') {
        $_SESSION['login'] = 'etudiant';
        $_SESSION['nom'] = 'El Amrani';
        $_SESSION['prenom'] = 'Yassine';
        $_SESSION['email'] = 'yassine@example.ma';

        header('Location: accueil.php');
        exit;
    }

    $erreur = 'Login ou mot de passe incorrect.';
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <h1>Connexion</h1>
    <p>Compte test : <code>etudiant</code> / <code>php2026</code></p>
    <?php if (isset($erreur)): ?>
        <p class="error"><?= $erreur ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Identifiant</label>
        <input name="login" required autofocus>
        <label>Mot de passe</label>
        <input type="password" name="mot_de_passe" required>
        <br><br>
        <button>Se connecter</button>
    </form>
</main>
</body>
</html>