<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrphanRecord extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public static function convertDateExcel($date){
        if(gettype($date) == 'integer'){
            $unix_date = ($date - 25569) * 86400;
            $excel_date = 25569 + ($unix_date / 86400);
            $unix_date = ($excel_date - 25569) * 86400;
            $date_f = gmdate("Y-m-d", $unix_date);
            return $date_f;
        }
        else{
            return $date;
        }
    }
}
