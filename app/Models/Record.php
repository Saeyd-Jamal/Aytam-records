<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = 'orphan_records';

    protected $fillable = [
        'name',
        'gender',
        'orphan_id',
        'date_of_birth',
        'address_of_birth',
        'orphan_age',
        'Id_father',
        'DFB_father',
        'mother_name',
        'Id_mother',
        'DMB_mother',
        'guardian_name',
        'guardian_RWO',
        'guardian_id',
        'DGM_guardian',
        'guardian_scientific_qualification',
        'guardian_work',
        'status_health_orphan',
        'health_status_notes',
        'deceased_name',
        'date_of_death',
        'cause_of_death',
        'child_orphaned_parents',
        'DMD_mother',
        'CMD_mother',
        'N_brothers',
        'N_sisters',
        'CH_house',
        'p_province',
        'p_city',
        'p_address',
        'c_province',
        'c_city',
        'c_address',
        'orphan_displaced',
        'mobile_number1',
        'mobile_number2',
        'WhatsApp_number',
        'livery',
        'financial_aid',
        'notes_orphan',
        'data_portal',
        'data_portal_name',
    ];
    
    public static function convertDateExcel($date){
        if (is_numeric($date)) { // تأكد من أن القيمة رقمية
            $unix_date = ($date - 25569) * 86400;
            $date_f = gmdate("Y-m-d", $unix_date);
            return $date_f;
        } else {
            return $date; // إذا كانت القيمة غير رقمية، أرجعها كما هي
        }
    }
}
