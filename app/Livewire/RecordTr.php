<?php

namespace App\Livewire;

use App\Exports\RecordExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RecordController;
use App\Models\Record;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class RecordTr extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap'; // تأكد من تعيين الشكل المناسب للتصفح

    public $paginationItems = 10;

    public $users;


    public $dilfilter;

    // array for selects
    public $causes_of_death_array;
    public $provinces_array;
    public $cities_array;
    public $address_of_birth;
    public $status_health_orphan_array;
    public $child_orphaned_parents_array;
    public $CH_house_array;
    public $orphan_displaced_array;
    public $guardian_RWOs_array;
    public $date_of_birth;
    public $date_of_birth_to;


    public function __construct(){
        $recordC = new RecordController();
        $this->causes_of_death_array = $recordC->causes_of_death;
        $this->provinces_array = $recordC->provinces;
        $this->cities_array = $recordC->cities;
        $this->address_of_birth = $recordC->address_of_birth;
        $this->status_health_orphan_array= $recordC->status_health_orphan;
        $this->child_orphaned_parents_array = $recordC->child_orphaned_parents;
        $this->CH_house_array = $recordC->CH_house;
        $this->orphan_displaced_array = $recordC->orphan_displaced;
        $this->guardian_RWOs_array = $recordC->guardian_RWOs;
        $this->date_of_birth = $recordC->date_of_birth;
        $this->date_of_birth_to = Carbon::now()->format('Y-m-d');
        $this->users = User::get();

        $this->dilfilter = 'none';
    }

    public function mount(){
        // $records = Record::query();
        // $this->records = $records->paginate(10);
        // $this->records = $this->records->items();
    }

    public $filterArray = [
        'first_name' => '',
        'father_name' => '',
        'grandfather_name' => '',
        'family_name' => '',
        'orphan_id' => '',
        'Id_father' => '',
        'Id_mother' => '',
        'first_guardian_name' => '',
        'father_guardian_name' => '',
        'grandfather_guardian_name' => '',
        'family_guardian_name' => '',
        'guardian_RWO' => '',
        'guardian_id' => '',
        'status_health_orphan' => '',
        'cause_of_death' => '',
        'child_orphaned_parents' => '',
        'CH_house' => '',
        'p_province' => '',
        'p_city' => '',
        'c_province' => '',
        'c_city' => '',
        'orphan_displaced' => '',
        'data_portal' => '',
        'section' => '',
        'date_of_birth_from' => '',
        'date_of_birth_to' => '',
        'created_at_from' => '',
        'created_at_to' => '',
    ];

    public function filter(){
        // $records = Record::query();
        // foreach ($this->filterArray as $key => $value) {
        //     if($value != null && $value != ''){
        //         if($key == 'date_of_birth_from'|| $key == 'created_at_from'){
        //             ($key == 'date_of_birth_from') ? $key = 'date_of_birth' : $key = 'created_at';
        //             if($value == ''){
        //                 $records->where($key ,'>=',$this->date_of_birth);
        //             }else{
        //                 $records->where($key ,'>=',"$value");
        //             }
        //         }elseif($key == 'date_of_birth_to'|| $key == 'created_at_to'){
        //             ($key == 'date_of_birth_to') ? $key = 'date_of_birth' : $key = 'created_at';
        //             if($value == ''){
        //                 $records->where($key ,'<=',Carbon::now()->format('Y-m-d'));
        //             }else{
        //                 $value = Carbon::parse($value)->format('Y-m-d');
        //                 $records->where($key ,'<=',"$value");
        //             }
        //         }elseif($key == 'name'){
        //             $valueS = str_replace('*', '%', $value);
        //             $records->where($key ,'LIKE',"%{$valueS}%");
        //         }else{
        //             $records->where($key ,'LIKE',"%{$value}%");
        //         }
        //     }
        // }
        // $this->records = $records->paginate(10);
        // $this->records = $this->records->items();
        // $this->dilfilter = '';


        // إعادة التهيئة إلى الصفحة الأولى عند تغيير الفلتر
        $this->render();
    }
    public function update($id,$name, $value){
        if($name == 'date_of_birth'){
            $value = Carbon::parse($value)->format('Y-m-d');
            $age = Carbon::now()->format('Y') - Carbon::parse($value)->format('Y');
            Record::where('id', $id)->update([
                "orphan_age" => $age,
            ]);
        }
        Record::where('id', $id)->update([
            "$name" => $value,
        ]);
    }

    public function render()
    {
        $records = Record::query();
        foreach ($this->filterArray as $key => $value) {
            if($value != null && $value != ''){
                if($key == 'date_of_birth_from'|| $key == 'created_at_from'){
                    ($key == 'date_of_birth_from') ? $key = 'date_of_birth' : $key = 'created_at';
                    if($value == ''){
                        $records->where($key ,'>=',$this->date_of_birth);
                    }else{
                        $records->where($key ,'>=',"$value");
                    }
                }elseif($key == 'date_of_birth_to'|| $key == 'created_at_to'){
                    ($key == 'date_of_birth_to') ? $key = 'date_of_birth' : $key = 'created_at';
                    if($value == ''){
                        $records->where($key ,'<=',Carbon::now()->format('Y-m-d'));
                    }else{
                        $value = Carbon::parse($value)->format('Y-m-d');
                        $records->where($key ,'<=',"$value");
                    }
                }elseif($key == 'name'){
                    $valueS = str_replace('*', '%', $value);
                    $records->where($key ,'LIKE',"%{$valueS}%");
                }else{
                    $records->where($key ,'LIKE',"%{$value}%");
                }
            }
        }
        foreach ($this->filterArray as $value) {
            if (!empty($value)) {
                $this->dilfilter = '';
                break; // خروج من الحلقة بمجرد العثور على قيمة غير فارغة
            }
        }

        $dilfilter = $this->dilfilter;

        if($this->dilfilter == ""){
            $records = $records->paginate(intval(50));
        }else{
            $records = $records->paginate(intval(50));
        }
        $filterArrayS = json_encode($this->filterArray);
        return view('livewire.record-tr',compact('records','dilfilter','filterArrayS'));
    }
}
