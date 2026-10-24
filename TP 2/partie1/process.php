
<style>
        body { 
            font-family: Arial, sans-serif; 
            max-width: 760px; 
            margin: 45px auto; 
            background: #f8fafc; 
            color: #172033; 
        }
        label { 
            display: block; 
            margin: 12px 0 4px; 
        } 
        .error { color: #b42318; } 
        .success { color: #067647; } 
        .box { padding: 13px; background: #eff6ff; }
    </style>

<?php 
if($_SERVER["REQUEST_METHOD"] != "POST")
    exit("Post Method Required !!!");

    $formData = [];

    foreach ($_POST as $key => $value)
        $formData[$key] = trim($value);

    $cin = $formData["CIN"];
    $name = $formData["name"];
    $lastName = $formData["lastName"];
    $tel = $formData["tel"];
    $email = $formData["email"];
    $birth = $formData["birth"];

    if (preg_match("/^[A-Z]{2}[0-9]{6}$/",$cin) == 0)
        exit("Invalid CIN");
    if (preg_match("/^[A-Za-z0-9.]+@[A-Za-z]+\.[a-z.]+$/",$email) == 0)
        exit("Invalid Email");
    if (preg_match("/^0[567]{1}[0-9]{8}$/",$tel) == 0)
        exit("Invalid Tel");

    if ($_FILES["cv"]["type"] != "application/pdf")
        exit("Not a valid file type !(expected pdf)") ;

    $maxSize = 1024 * 1024 * 2 ;
    if ($_FILES["cv"]["size"] > $maxSize)
        exit("CV's size not valide (Max 2MB) !") ;

    if (move_uploaded_file($_FILES["cv"]["tmp_name"],"uploads/cv{$cin}.pdf"))
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