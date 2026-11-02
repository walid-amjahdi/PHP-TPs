<?php

$date1 = new DateTime("2012-09-01 09:00:00");
$date2 = clone $date1;

$interval = new DateInterval("P10D");

$date1->add($interval);
echo $date1->format("D d M Y g:i:s a") . "<br>";


$date2->sub($interval);
echo $date2->format("D d M Y g:i:s a") . "<br>";

$diff = $date1->diff($date2);

echo $diff->format("%m months and %d days") . "<br>";


?>