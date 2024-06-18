<?php

namespace App\Exports;

use App\Models\OrphanRecord;
use App\Models\RecordsConstant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrphanRecordExport implements FromCollection,WithHeadings
{
    protected $filter;
    public function __construct(Request $request){
        $this->filter = $request;
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
            'مدخل البيانات'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orphan_search_id = $this->filter->get('orphan_id');
        $orphan_search_name = $this->filter->get('orphan_name');
        $orphan_search_p_province = $this->filter->get('p_province');
        $orphan_search_p_city = $this->filter->get('p_city');
        $orphan_search_c_province = $this->filter->get('orphan_search_c_province');
        $orphan_search_c_city = $this->filter->get('orphan_search_c_city');
        $orphan_search_mother_name = $this->filter->get('mother_name');
        $orphan_search_deceased_name = $this->filter->get('deceased_name');
        $orphan_search_cause_of_death = $this->filter->get('cause_of_death');
        $orphan_search_status = $this->filter->get('status_health_orphan');
        $orphan_search_child_orphaned_parents = $this->filter->get('child_orphaned_parents');
        $orphan_search_CH_house = $this->filter->get('CH_house');
        $orphan_search_from_date = $this->filter->get('date_of_birth_from');
        $orphan_search_to_date = $this->filter->get('date_of_birth_to');
        $orphan_search_orphan_displaced = $this->filter->get('orphan_displaced');
        $orphan_search_livery = $this->filter->get('livery');
        $orphan_search_financial_aid = $this->filter->get('financial_aid');
        $orphan_search_created_at_from = $this->filter->get('orphan_search_created_at_from');
        $orphan_search_created_at_to = $this->filter->get('orphan_search_created_at_to');
        $orphan_search_data_portal = $this->filter->get('orphan_search_data_portal');

        $orphans = OrphanRecord::select('name','gender','orphan_id','date_of_birth','address_of_birth','orphan_age','Id_father','DFB_father','mother_name','Id_mother','DMB_mother','guardian_name','guardian_RWO','guardian_id','DGM_guardian','status_health_orphan','health_status_notes','deceased_name','date_of_death','cause_of_death','child_orphaned_parents','DMD_mother','CMD_mother','N_brothers','N_sisters','CH_house','p_province','p_city','p_address','c_province','c_city','c_address','orphan_displaced','mobile_number1','mobile_number2','WhatsApp_number','livery','financial_aid','notes_orphan','data_portal','data_portal_name');
        // filter
        if($orphan_search_id != null){
            $orphans->where('orphan_id','LIKE',"%{$orphan_search_id}%");
        }
        if($orphan_search_name != null){
            $orphans->where('name','LIKE',"{$orphan_search_name}%");
        }
        if($orphan_search_p_province != null){
            $orphans->where('p_province','LIKE',"%{$orphan_search_p_province}%");
        }
        if($orphan_search_p_city != null){
            $orphans->where('p_city','LIKE',"%{$orphan_search_p_city}%");
        }
        if($orphan_search_c_province != null){
            $orphans->where('c_province','LIKE',"%{$orphan_search_c_province}%");
        }
        if($orphan_search_c_city != null){
            $orphans->where('c_city','LIKE',"%{$orphan_search_c_city}%");
        }
        if($orphan_search_mother_name != null){
            $orphans->where('mother_name','LIKE',"{$orphan_search_mother_name}%");
        }
        if($orphan_search_deceased_name != null){
            $orphans->where('deceased_name','LIKE',"{$orphan_search_deceased_name}%");
        }
        if($orphan_search_cause_of_death != null){
            $orphans->where('orphan_search_deceased_name','LIKE',"%{$orphan_search_cause_of_death}%");
        }
        if($orphan_search_status != null){
            $orphans->where('status_health_orphan','LIKE',"%{$orphan_search_status}%");
        }
        if($orphan_search_child_orphaned_parents != null){
            $orphans->where('child_orphaned_parents','LIKE',"%{$orphan_search_child_orphaned_parents}%");
        }
        if($orphan_search_CH_house != null){
            $orphans->where('CH_house','LIKE',"%{$orphan_search_CH_house}%");
        }
        if($orphan_search_orphan_displaced != null){
            $orphans->where('orphan_displaced','LIKE',"%{$orphan_search_orphan_displaced}%");
        }
        if($orphan_search_livery != null){
            $orphans->where('livery','LIKE',"%{$orphan_search_livery}%");
        }
        if($orphan_search_financial_aid != null){
            $orphans->where('financial_aid','LIKE',"%{$orphan_search_financial_aid}%");
        }
        if($orphan_search_from_date == $orphan_search_to_date){
            $orphans->where('date_of_birth', '<>', $orphan_search_from_date);
        }
        if($orphan_search_from_date != null){
            $orphans->where('date_of_birth', '>=', $orphan_search_from_date);
        }
        if($orphan_search_to_date != null){
            $orphans->where('date_of_birth', '<=', $orphan_search_to_date);
        }
        if($orphan_search_created_at_from == $orphan_search_created_at_to){
            $orphans->where('created_at',"<>", $orphan_search_created_at_to);
        }
        if($orphan_search_created_at_from != null){
            $orphans->where('created_at', '>=', $orphan_search_created_at_from);
        }
        if($orphan_search_created_at_to != null){
            $orphans->where('created_at', '<=', $orphan_search_created_at_to);
        }
        if($orphan_search_data_portal != null){
            $orphans->where('data_portal', '=', $orphan_search_data_portal);
        }

        return $orphans->get();
    }
}
