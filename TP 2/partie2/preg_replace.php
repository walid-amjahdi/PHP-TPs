<?php require 'header.php';
$texte = 'Le cours PHP commence le 15/10/2026.';
$resultat = preg_replace('/\b\d{2}\/\d{2}\/\d{4}\b/', '[date masquée]', $texte, 1);
?>
<h1>preg_replace()</h1><p>Remplace les correspondances. Le quatrième argument limite ici le remplacement à une seule occurrence.</p>
<pre>$resultat = preg_replace('/\b\d{2}\/\d{2}\/\d{4}\b/', '[date masquée]', $texte, 1);</pre>
<div class="resultat"><?= htmlspecialchars($resultat) ?></div>
<?php require 'footer.php'; ?>
