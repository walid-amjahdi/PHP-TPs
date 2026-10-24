<?php
require 'auth.php'; requireLogin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $langue = $_POST['langue'] ?? 'fr';
    if (in_array($langue, ['fr', 'ar', 'en'], true)) {
        setcookie('langue', $langue, ['expires' => time() + 60 * 60 * 24 * 30, 'path' => '/', 'httponly' => true, 'samesite' => 'Lax']);
        header('Location: informations.php?pref=ok'); exit;
    }
}
$user = $_SESSION['utilisateur'];
$langue = $_COOKIE['langue'] ?? 'fr';
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><title>Informations</title><link rel="stylesheet" href="style.css"></head><body><main>
<nav><a href="accueil.php">Accueil</a><a href="informations.php">Mes informations</a><a href="logout.php">Déconnexion</a></nav>
<h1>Mes informations</h1>
<?php if (isset($_GET['pref'])): ?><p class="success">Préférence enregistrée dans le cookie.</p><?php endif; ?>
<div class="box"><strong>Login :</strong> <?= e($user['login']) ?><br><strong>Nom :</strong> <?= e($user['nom']) ?><br><strong>Prénom :</strong> <?= e($user['prenom']) ?><br><strong>E-mail :</strong> <?= e($user['email']) ?></div>
<h2>Préférence de langue (cookie)</h2><p>Langue actuelle : <strong><?= e($langue) ?></strong>. Ce choix est mémorisé pendant 30 jours.</p>
<form method="post"><label>Langue <select name="langue"><option value="fr" <?= $langue === 'fr' ? 'selected' : '' ?>>Français</option><option value="ar" <?= $langue === 'ar' ? 'selected' : '' ?>>العربية</option><option value="en" <?= $langue === 'en' ? 'selected' : '' ?>>English</option></select></label><button>Enregistrer la préférence</button></form>
</main></body></html>
