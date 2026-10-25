<?php
namespace App\Services;

use DateTime;

class DateFormat
{
    public function showDate()
    {
        $date = new DateTime();
        return $date->format('d/m/Y');
    }
}

$manager = new DateFormat();
echo $manager->showDate();
