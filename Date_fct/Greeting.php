<?php 

$currentDate = date("G");

if ($currentDate < 11)
    {
        echo "Good Morning";
    }
elseif ($currentDate < 17)
    {
        echo "Good Afternoon";
    }
else 
    {
        echo "Good Evening";
    }

    echo "<br>The current time is " , $currentDate ; 
?>