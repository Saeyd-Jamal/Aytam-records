<?php

namespace App\Livewire;

use App\Models\Record;
use App\Models\RecordsConstant;
use Livewire\Component;

class TableAddAytam extends Component
{
    public $aytam = 0;
    public $orphan_id_error = '';

    public $date_of_birth = [];
    public $date_of_birth_to = [];
    public $status_health_orphans = [];
    public $child_orphaned_parents_array = [];
    public $causes_of_death = ['شهيد/ة','مرض','وفاه طبيعية'];


    public $disabledFields_child_orphaned_parents = []; // مصفوفة لتتبع الحقول المعطلة

    public function __construct()
    {
        $this->date_of_birth = RecordsConstant::where('type_constant','=','date_of_birth')->get();
        $this->date_of_birth_to = now()->format('Y-m-d');
        $status_health_orphans = RecordsConstant::where('type_constant','=','status_health_orphan')->get();
        foreach($status_health_orphans as $status_health_orphan_val ){
            $this->status_health_orphans[] = $status_health_orphan_val['values'];
        }
        $child_orphaned_parents_array = RecordsConstant::where('type_constant','=','child_orphaned_parents')->get();
        foreach($child_orphaned_parents_array as $child_orphaned_parents_val ){
            $this->child_orphaned_parents_array[] = $child_orphaned_parents_val['values'];
        }
    }

    public function disableField_child_orphaned_parents($index, $value) {
        if($value == 'يتيم الأب' || $value == null){
            $this->disabledFields_child_orphaned_parents[$index] = false; // تعيين الحقل كمعطل بناءً على الفهرس
        }
        if($value == 'يتيم الأبوين'){
            $this->disabledFields_child_orphaned_parents[$index] = true; // تعيين الحقل كمعطل بناءً على الفهرس
        }
    }


    public function addRow(){
        $this->aytam += 1;
    }

    public function checkID($value){
        $orphan_id = Record::where('orphan_id','=',"{$value}")->first();
        if($orphan_id != null){
            $this->orphan_id_error = 'رقم الهوية ليتيم اخر يرجى التأكد';
        }else{
            $this->orphan_id_error = '';
        }
    }
    public function render()
    {
        return view('livewire.table-add-aytam');
    }
}
