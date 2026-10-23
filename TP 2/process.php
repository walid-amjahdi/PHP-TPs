<?php 
if($_SERVER["REQUEST_METHOD"] != "POST")
    exit("Post Method Required !!!");

    $formData = [];

    foreach ($_POST as $key => $value)
        $formData[$key] = htmlspecialchars(trim($value));

    $cin = $formData["CIN"];
    $name = $formData["name"];
    $lastName = $formData["lastName"];
    $tel = $formData["tel"];
    $email = $formData["email"];
    $birth = $formData["birth"];



?>