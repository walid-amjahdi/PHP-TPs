<?php require 'header.php';
$texte = 'Prix : 10 DH, 25 DH et 7 DH.';
$resultat = preg_replace_callback('/\b(\d+) DH\b/', function ($m) { return ($m[1] * 1.2) . ' DH TTC'; }, $texte);
?>
<h1>preg_replace_callback()</h1><p>Remplace chaque correspondance par la valeur calculée dans une fonction.</p>
<pre>$resultat = preg_replace_callback('/\b(\d+) DH\b/', function ($m) {
    return ($m[1] * 1.2) . ' DH TTC';
}, $texte);</pre>
<div class="resultat"><?= htmlspecialchars($resultat) ?></div>
<?php require 'footer.php'; ?>
