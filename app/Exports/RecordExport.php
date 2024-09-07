<?php

namespace App\Exports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecordExport implements FromCollection,WithHeadings
{
    public $records;
    public function __construct($records){
        $this->records = $records;
    }

    public function headings(): array
    {
        return [
            'اسم اليتيم رباعي',
            'الجنس',
            'رقم هوية اليتيم',
            'تاريخ الميلاد',
            'مكان الميلاد',
            'عمر اليتيم',
            'رقم هوية الأب',
            'تاريخ ميلاد الأب',
            'اسم الام رباعي',
            'رقم هوية الأم',
            'تاريخ ميلاد الأم',
            'اسم ولي الامر',
            'صلة القرابة باليتيم',
            'هوية ولي الامر',
            'تاريخ ميلاد ولي الأمر',
            'المؤهل العلمي لولي الامر',
            'عمل ولي الأمر',
            'الحالة الصحية لليتيم',
            'ملاحظات- اليتيم المريض',
            'اسم المتوفى',
            'تاريخ الوفاة',
            'سبب الوفاة',
            'هل الطفل يتيم الابوين ؟',
            'تاريخ وفاة الام',
            'سبب وفاة الام',
            'عدد الاخوة الذكور',
            'عدد الاخوة الاناث',
            'وضع البيت',
            'المحافظة السابقة',
            'المدينة السابقة',
            'العنوان السابق بالتفصيل',
            'المحافظة الحالية',
            'المدينة الحالية',
            'العنوان الحالي بالتفصيل',
            'هل اليتيم نازح؟',
            'رقم جوال 1',
            'رقم جوال 2',
            'رقم واتس',
            'استفاد/كسوة',
            'استفاد/كفالة',
            'ملاحظات عن اليتيم',
            'مدخل البيانات',
            'تاريخ الإدخال'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $records = $this->records->select('name','gender','orphan_id','date_of_birth','address_of_birth','orphan_age','Id_father','DFB_father','mother_name','Id_mother','DMB_mother','guardian_name','guardian_RWO','guardian_id','DGM_guardian','guardian_scientific_qualification','guardian_work','status_health_orphan','health_status_notes','deceased_name','date_of_death','cause_of_death','child_orphaned_parents','DMD_mother','CMD_mother','N_brothers','N_sisters','CH_house','p_province','p_city','p_address','c_province','c_city','c_address','orphan_displaced','mobile_number1','mobile_number2','WhatsApp_number','livery','financial_aid','notes_orphan','data_portal_name','created_at');

        return $records->get();
    }
}
