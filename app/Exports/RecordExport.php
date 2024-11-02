<?php

namespace App\Exports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecordExport implements FromCollection,WithHeadings
{
    public $query;
    protected $chunkSize;

    public function __construct($query, $chunkSize = 1000){
        $this->query = $query;
        $this->chunkSize = $chunkSize;
    }

    public function headings(): array
    {
        return [
            'اسم اليتيم',
            'اسم الاب',
            'اسم الجد',
            'اسم العائلة',
            'الجنس',
            'رقم هوية اليتيم',
            'تاريخ الميلاد',
            'عمر اليتيم',
            'مكان الميلاد',
            'الحالة الصحية لليتيم',
            'ملاحظات- اليتيم المريض',
            'هل الطفل يتيم الابوين ؟',
            'عدد الاخوة الذكور',
            'عدد الاخوة الاناث',
            'ملاحظات عن اليتيم',

            'اسم المتوفى',
            'اسم والد المتوفي',
            'اسم جد المتوفي',
            'اسم عائلة المتوفي',
            'رقم هوية الأب',
            'تاريخ ميلاد الأب',
            'تاريخ الوفاة',
            'سبب الوفاة',


            'اسم الام',
            'اسم والد الأم',
            'اسم جد الأم',
            'اسم عائلة الأم',
            'رقم هوية الأم',
            'تاريخ ميلاد الأم',
            'تاريخ وفاة الام',
            'سبب وفاة الام',
            'الحالة الإجتماعية للأم',


            'اسم ولي الامر',
            'اسم والد ولي الأمر',
            'اسم جد ولي الأمر',
            'اسم عائلة ولي الأمر',
            'صلة القرابة باليتيم',
            'هوية ولي الامر',
            'تاريخ ميلاد ولي الأمر',
            'المؤهل العلمي لولي الامر',
            'عمل ولي الأمر',
            'رقم جوال 1',
            'رقم جوال 2',
            'رقم واتس',


            'وضع البيت',
            'المحافظة السابقة',
            'المدينة السابقة',
            'العنوان السابق بالتفصيل',
            'المحافظة الحالية',
            'المدينة الحالية',
            'العنوان الحالي بالتفصيل',
            'هل اليتيم نازح؟',

            'استفاد/كسوة',
            'استفاد/كفالة',
            'مدخل البيانات',
            'الفرع',
            'تاريخ الإدخال'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     $records = $this->records->select('name','gender','orphan_id','date_of_birth','address_of_birth','orphan_age','Id_father','DFB_father','mother_name','Id_mother','DMB_mother','guardian_name','guardian_RWO','guardian_id','DGM_guardian','guardian_scientific_qualification','guardian_work','status_health_orphan','health_status_notes','deceased_name','date_of_death','cause_of_death','child_orphaned_parents','DMD_mother','CMD_mother','N_brothers','N_sisters','CH_house','p_province','p_city','p_address','c_province','c_city','c_address','orphan_displaced','mobile_number1','mobile_number2','WhatsApp_number','livery','financial_aid','notes_orphan','data_portal_name','created_at');

    //     return $records->get();
    // }


    // تنفيذ الـ chunk على البيانات داخل collection
    public function collection()
    {
        $data = collect();

        // استخدام chunk مع الفلترة
        $this->query->orderBy('id')->chunk($this->chunkSize, function ($records) use (&$data) {
            foreach ($records as $record) {
                $data->push([
                    $record->first_name,
                    $record->father_name,
                    $record->grandfather_name,
                    $record->family_name,
                    $record->gender,
                    $record->orphan_id,
                    $record->date_of_birth,
                    $record->age,
                    $record->address_of_birth,
                    $record->status_health_orphan,
                    $record->health_status_notes,
                    $record->child_orphaned_parents,
                    $record->N_brothers,
                    $record->N_sisters,
                    $record->notes_orphan,

                    $record->first_deceased_name,
                    $record->father_deceased_name,
                    $record->grandfather_deceased_name,
                    $record->family_deceased_name,
                    $record->Id_father,
                    $record->DFB_father,
                    $record->date_of_death,
                    $record->cause_of_death,


                    $record->first_mother_name,
                    $record->father_mother_name,
                    $record->grandfather_mother_name,
                    $record->family_mother_name,
                    $record->Id_mother,
                    $record->DMB_mother,
                    $record->DMD_mother,
                    $record->CMD_mother,
                    $record->mother_social_situation,


                    $record->first_guardian_name,
                    $record->father_guardian_name,
                    $record->grandfather_guardian_name,
                    $record->family_guardian_name,
                    $record->guardian_RWO,
                    $record->guardian_id,
                    $record->DGM_guardian,
                    $record->guardian_scientific_qualification,
                    $record->guardian_work,
                    $record->mobile_number1,
                    $record->mobile_number2,
                    $record->WhatsApp_number,

                    
                    $record->CH_house,
                    $record->p_province,
                    $record->p_city,
                    $record->p_address,
                    $record->c_province,
                    $record->c_city,
                    $record->c_address,
                    $record->orphan_displaced,

                    $record->livery,
                    $record->financial_aid,
                    $record->data_portal_name,
                    $record->section,
                    $record->created_at,
                ]);
            }
        });

        return $data;
    }
}
