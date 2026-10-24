<?php
require 'auth.php';
if (!empty($_SESSION['utilisateur'])) { header('Location: accueil.php'); exit; }

$erreur = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $motDePasse = $_POST['mot_de_passe'] ?? '';
    // Comptes codés en dur uniquement pour la démonstration du TP.
    if ($login === 'etudiant' && $motDePasse === 'php2026') {
        $_SESSION['utilisateur'] = ['login' => $login, 'nom' => 'El Amrani', 'prenom' => 'Yassine', 'email' => 'yassine@example.ma'];
        header('Location: accueil.php'); exit;
    }
    $erreur = 'Identifiant ou mot de passe incorrect.';
}
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><title>Connexion</title><link rel="stylesheet" href="style.css"></head><body><main>
<h1>Connexion</h1><p>Compte test : <code>etudiant</code> / <code>php2026</code></p>
<?php if ($erreur): ?><p class="error"><?= e($erreur) ?></p><?php endif; ?>
<form method="post"><label>Identifiant</label><input name="login" required autofocus><label>Mot de passe</label><input type="password" name="mot_de_passe" required><br><br><button>Se connecter</button></form>
</main></body></html>
