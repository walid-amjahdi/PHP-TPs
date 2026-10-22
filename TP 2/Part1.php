<?php 
?>

<form method="POST">
<label for="CIN">CIN :</label>
<input type="text" name="CIN" id="CIN">
<br><br>
<label for="name">Name :</label>
<input type="text" name="name" id="name">
<br><br>
<label for="lastName">Last Name :</label>
<input type="text" name="lastName" id="lastName">
<br><br>
<label for="tel">Tel :</label>
<input type="text" name="tel" id="tel">
<br><br>
<label for="email">Email :</label>
<input type="text" name="email" id="email">
<br><br>
<label for="birth">Birthday date :</label>
<input type="date" name="birth" id="birth">
<br><br>
<label for="cv">Upload your cv (taille < 2MB) :</label>
<input type="file" name="cv" id="cv">
<br><br>
</form>



<!-- Préparer un formulaire qui contient
CIN NOM PRENOM TEL EMAIL
DATENAiss CV

Le CIN doit commencer par deux
caractères
NOM PRENOM est une chaine valide
TEL tel valide
Email Email valide
CV fichier type pdf qui ne dépasse pas
2MO

Lorsque le formulaire sera envoyé garder
les informations dans un fichier CSV -->