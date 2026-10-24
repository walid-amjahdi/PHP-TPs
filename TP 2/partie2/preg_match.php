<?php require 'header.php';
$cin = 'AB123456';
$estValide = preg_match('/^[A-Z]{2}\d{6}$/', $cin);
?>
<h1>preg_match()</h1><p>Teste si le motif apparaît dans une chaîne. Retourne 1 si oui, 0 sinon.</p>
<pre>$estValide = preg_match('/^[A-Z]{2}\d{6}$/', $cin);</pre>
<div class="resultat">CIN <?= htmlspecialchars($cin) ?> : <?= $estValide ? 'valide' : 'invalide' ?></div>
<?php require 'footer.php'; ?>
