<?php

namespace App\Livewire;

use App\Exports\RecordExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RecordController;
use App\Models\Record;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class RecordTr extends Component
{
    public $records;

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
        $records = Record::query();
        $this->records = $records->paginate(10);
        $this->records = $this->records->items();
    }

    public $flterArray = [
        'name' => '',
        'orphan_id' => '',
        'Id_father' => '',
        'mother_name' => '',
        'Id_mother' => '',
        'guardian_name' => '',
        'guardian_RWO' => '',
        'guardian_id' => '',
        'status_health_orphan' => '',
        'deceased_name' => '',
        'cause_of_death' => '',
        'child_orphaned_parents' => '',
        'CH_house' => '',
        'p_province' => '',
        'p_city' => '',
        'c_province' => '',
        'c_city' => '',
        'orphan_displaced' => '',
        'data_portal' => '',
        'date_of_birth_from' => '',
        'date_of_birth_to' => '',
        'created_at_from' => '',
        'created_at_to' => '',
    ];

    public function filter(){
        $records = Record::query();
        foreach ($this->flterArray as $key => $value) {
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
        $this->records = $records->paginate(10);
        $this->records = $this->records->items();
        $this->dilfilter = '';
    }
    public function update($name, $value){
        Record::updateOrCreate([
            'id' => $this->record->id,
        ],[
            "$name" => $value,
        ]);
    }
    public function export(){
        $records = Record::query();
        foreach ($this->flterArray as $key => $value) {
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
                }else{
                    $records->where($key ,'LIKE',"%{$value}%");
                }
            }
        }
        $time = Carbon::now()->format('Y-m-d_H:i:s');
        return Excel::download(new RecordExport($records), "سجلات الأيتام - $time.xlsx");
    }
    public function render()
    {
        return view('livewire.record-tr',);
    }
}
