<?php require 'header.php';
$emails = ['amine@example.com', 'adresse-invalide', 'sara@test.ma', 'sans-arobase'];
$valides = preg_grep('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $emails);
?>
<h1>preg_grep()</h1><p>Filtre les valeurs d'un tableau qui correspondent à une expression régulière.</p>
<pre>$valides = preg_grep('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $emails);</pre>
<div class="resultat">E-mails valides : <?= htmlspecialchars(implode(', ', $valides)) ?></div>
<?php require 'footer.php'; ?>
