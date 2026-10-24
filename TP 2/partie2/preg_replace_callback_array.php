<?php require 'header.php';
$texte = 'Référence ab-12, statut OK.';
$resultat = preg_replace_callback_array([
    '/\b[a-z]{2}-\d{2}\b/' => fn($m) => strtoupper($m[0]),
    '/\bOK\b/' => fn($m) => 'validé'
], $texte);
?>
<h1>preg_replace_callback_array()</h1><p>Associe plusieurs motifs à leurs fonctions de remplacement.</p>
<pre>$resultat = preg_replace_callback_array([
    '/\b[a-z]{2}-\d{2}\b/' => fn($m) => strtoupper($m[0]),
    '/\bOK\b/' => fn($m) => 'validé'
], $texte);</pre>
<div class="resultat"><?= htmlspecialchars($resultat) ?></div>
<?php require 'footer.php'; ?>
