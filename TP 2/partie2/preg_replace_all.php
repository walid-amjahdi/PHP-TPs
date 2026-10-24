<?php require 'header.php';
$texte = 'Téléphone : 0612345678 ou 0711223344.';
// PHP ne possède pas preg_replace_all : preg_replace sans limite remplace déjà toutes les occurrences.
$resultat = preg_replace('/\b0[5-7]\d{8}\b/', '[numéro masqué]', $texte);
?>
<h1>« preg_replace_all »</h1><p>Il n'existe pas de fonction <code>preg_replace_all()</code> en PHP. <code>preg_replace()</code>, sans limite, remplace toutes les occurrences.</p>
<pre>$resultat = preg_replace('/\b0[5-7]\d{8}\b/', '[numéro masqué]', $texte);</pre>
<div class="resultat"><?= htmlspecialchars($resultat) ?></div>
<?php require 'footer.php'; ?>
