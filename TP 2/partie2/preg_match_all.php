<?php require 'header.php';
$texte = 'Les groupes sont ISI, GI et IDAI.';
$nombre = preg_match_all('/\b[A-Z]{2,4}\b/', $texte, $correspondances);
?>
<h1>preg_match_all()</h1><p>Cherche toutes les correspondances et les place dans un tableau.</p>
<pre>$nombre = preg_match_all('/\b[A-Z]{2,4}\b/', $texte, $correspondances);</pre>
<div class="resultat"><?= $nombre ?> résultat(s) : <?= htmlspecialchars(implode(', ', $correspondances[0])) ?></div>
<?php require 'footer.php'; ?>
