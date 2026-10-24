<?php require 'header.php';
$texte = 'Commande A12, commande B34 et commande C56';
$resultat = preg_filter('/\b[A-Z]\d{2}\b/', 'REF-$0', $texte);
?>
<h1>preg_filter()</h1><p>Remplace les éléments qui correspondent au motif. Si rien ne correspond, retourne <code>null</code>.</p>
<pre>$resultat = preg_filter('/\b[A-Z]\d{2}\b/', 'REF-$0', $texte);</pre>
<div class="resultat">Texte : <?= htmlspecialchars($texte) ?><br>Résultat : <?= htmlspecialchars($resultat) ?></div>
<?php require 'footer.php'; ?>
