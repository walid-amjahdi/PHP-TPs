<?php require 'header.php';
$regles = ['email' => FILTER_VALIDATE_EMAIL, 'age' => ['filter' => FILTER_VALIDATE_INT, 'options' => ['min_range' => 16, 'max_range' => 100]]];
$donnees = filter_input_array(INPUT_GET, $regles);
?>
<h1>filter_input_array()</h1><p>Lit et valide plusieurs entrées en une seule instruction.</p>
<form method="get"><label>E-mail : <input name="email"></label><br><label>Âge : <input name="age" type="number"></label><br><button>Valider</button></form>
<pre>$donnees = filter_input_array(INPUT_GET, $regles);</pre>
<?php if (isset($_GET['email'], $_GET['age'])): ?><div class="resultat">E-mail : <?= $donnees['email'] ? htmlspecialchars($donnees['email']) : 'invalide' ?><br>Âge : <?= $donnees['age'] !== false ? $donnees['age'] : 'invalide (16 à 100)' ?></div><?php endif; ?>
<?php require 'footer.php'; ?>
