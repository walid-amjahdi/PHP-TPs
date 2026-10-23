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

    if ($_FILES["cv"]["type"] != "application/pdf")
        exit("Not a valid file type !(expected pdf)") ;

    $maxSize = 1024 * 1024 * 2 ;
    if ($_FILES["cv"]["size"] > $maxSize)
        exit("CV's size not valide (Max 2MB) !") ;

    if (move_uploaded_file($_FILES["cv"]["tmp_name"],"uploads/"))
        echo "cv saved succesfuly <br>";
    else
        exit("Error while saving CV") ;

    $row = [$cin,$name,$lastName,$tel,$email,$birth];

    $fileHandle = fopen("data.csv","a");
    if ($fileHandle)
        {
            fputcsv($fileHandle,$row,",","\"","\\");
            fclose($fileHandle);
            echo "User infos saved succesfuly <br>";
        }
    else
        exit("Error while saving User") ;

    

?>