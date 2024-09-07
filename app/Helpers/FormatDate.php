<?php

namespace App\Helpers;

use Carbon\Carbon;

class FormatDate
{
    public function __invoke($param)
    {
        return static::formatDate($param);
    }
    public static function formatDate($date){
        $date_c = Carbon::parse($date);
        $date_f = $date_c->format('Y-m-d');
        return $date_f;
    }
}
