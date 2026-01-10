<?php

namespace App\Helpers;

use DateTime;

class DateHelper
{

    public static function formatDate($date)
    {
        $dateFormat = new DateTime($date);
        $daySpecific = $dateFormat->format('l');

        return self::translateDay($daySpecific);
    }

    public static function translateDay($day)
    {
        $map = [
            'Monday' => 'lunes',
            'Tuesday' => 'martes',
            'Wednesday' => 'miércoles',
            'Thursday' => 'jueves',
            'Friday' => 'viernes',
            'Saturday' => 'sábado',
            'Sunday' => 'domingo',
        ];

        return $map[$day] ?? $day;
    }

}
