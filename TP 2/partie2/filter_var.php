<?php require 'header.php';
$email = 'etudiant@ofppt.ma';
$emailValide = filter_var($email, FILTER_VALIDATE_EMAIL);
$html = '<strong>Bonjour</strong><script>alert(1)</script>';
$nettoye = filter_var($html, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>
<h1>filter_var()</h1><p>Valide ou nettoie une valeur déjà disponible dans une variable.</p>
<pre>$emailValide = filter_var($email, FILTER_VALIDATE_EMAIL);
$nettoye = filter_var($html, FILTER_SANITIZE_FULL_SPECIAL_CHARS);</pre>
<div class="resultat">E-mail : <?= $emailValide ? 'valide' : 'invalide' ?><br>HTML sécurisé : <?= $nettoye ?></div>
<?php require 'footer.php'; ?>
