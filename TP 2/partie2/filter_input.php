<?php require 'header.php';
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
?>
<h1>filter_input()</h1><p>Lit et valide directement une valeur de GET, POST, COOKIE, etc.</p>
<form method="get"><label>E-mail : <input name="email" value="<?= htmlspecialchars($_GET['email'] ?? '') ?>"></label><button>Tester</button></form>
<pre>$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);</pre>
<?php if (isset($_GET['email'])): ?><div class="resultat"><?= $email ? 'E-mail valide : ' . htmlspecialchars($email) : 'E-mail invalide.' ?></div><?php endif; ?>
<?php require 'footer.php'; ?>
