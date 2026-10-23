<?php 
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $formData = [];
        foreach ($_POST as $key => $value)
            {
                $formData[$key] = htmlspecialchars(trim($value));
            }

        $cin = $formData["CIN"];
        $name = $formData["name"];
        $lastName = $formData["lastName"];
        $tel = $formData["yel"];
        $email = $formData["email"];
        $birth = $formData["birth"];

    }
?>

<form method="POST" enctype="multipart/form-data">
<label for="CIN">CIN :</label>
<input type="text" name="CIN" id="CIN" required>
<br><br>
<label for="name">Name :</label>
<input type="text" name="name" id="name" required>
<br><br>
<label for="lastName">Last Name :</label>
<input type="text" name="lastName" id="lastName" required>
<br><br>
<label for="tel">Tel :</label>
<input type="text" name="tel" id="tel" required>
<br><br>
<label for="email">Email :</label>
<input type="text" name="email" id="email" required>
<br><br>
<label for="birth">Birthday date :</label>
<input type="date" name="birth" id="birth" required>
<br><br>
<label for="cv">Upload your cv (taille < 2MB) :</label>
<input type="file" name="cv" id="cv">
<br><br>
<button type="submit">Save User</button>
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