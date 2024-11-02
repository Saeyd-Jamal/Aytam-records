<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        // بيانات اليتيم
        'first_name',
        'father_name',
        'grandfather_name',
        'family_name',
        // ---------
        'gender',
        'orphan_id',
        'date_of_birth',
        'age',
        'address_of_birth',
        'status_health_orphan',
        'health_status_notes',
        'child_orphaned_parents',
        'N_brothers',
        'N_sisters',
        'notes_orphan',

        // بيانات المتوفي
        'first_deceased_name',
        'father_deceased_name',
        'grandfather_deceased_name',
        'family_deceased_name',
        // بيانات الأب
        'Id_father',
        'DFB_father',
        // ---------
        'date_of_death',
        'cause_of_death',

        
        // بيانات الام
        'first_mother_name',
        'father_mother_name',
        'grandfather_mother_name',
        'family_mother_name',
        // ---------
        'Id_mother',
        'DMB_mother',
        'DMD_mother',
        'CMD_mother',
        'mother_social_situation',


        // بيانات ولي الأمر
        'first_guardian_name',
        'father_guardian_name',
        'grandfather_guardian_name',
        'family_guardian_name',

        // ---------
        'guardian_RWO',
        'guardian_id',
        'DGM_guardian',
        'guardian_scientific_qualification',
        'guardian_work',
        // ---------
        'mobile_number1',
        'mobile_number2',
        'WhatsApp_number',

        // بيانات السكن
        'CH_house',
        'p_province',
        'p_city',
        'p_address',
        'c_province',
        'c_city',
        'c_address',
        'orphan_displaced',

        'livery',
        'financial_aid',

        'data_portal',
        'data_portal_name',
        'section'
    ];



    public static function convertDateExcel($date){
        if (is_numeric($date)) { // تأكد من أن القيمة رقمية
            $unix_date = ($date - 25569) * 86400;
            $date_f = gmdate("Y-m-d", $unix_date);
            return $date_f;
        } else {
            return null; // إذا كانت القيمة غير رقمية، أرجعها كما هي
        }
    }
}
