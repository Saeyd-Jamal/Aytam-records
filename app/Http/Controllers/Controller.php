<?php

namespace App\Http\Controllers;

use App\Models\RecordsConstant;

abstract class Controller
{
    public $causes_of_death = ['شهيد/ة','مرض','وفاه طبيعية'];
    public $gender = [];
    public $provinces = [] ;
    public $cities = [] ;
    public $address_of_birth = [] ;
    public $status_health_orphan =[] ;
    public $child_orphaned_parents =[];
    public $CH_house = [];
    public $orphan_displaced =[];
    public $livery =[];
    public $financial_aid =[];
    public $guardian_RWOs =[];
    public $date_of_birth ;


    public function __construct(){
        $gender = RecordsConstant::where('type_constant','=','gender')->get();
        foreach($gender as $gender_val ){
            $this->gender[] = $gender_val['values'];
        }
        $provinces = RecordsConstant::where('type_constant','=','provinces')->get();
        foreach($provinces as $province ){
            $this->provinces[] = $province['values'];
        }
        $cities = RecordsConstant::where('type_constant','=','cities')->get();
        foreach($cities as $city ){
            $this->cities[] = $city['values'];
        }
        $address_of_birth = RecordsConstant::where('type_constant','=','address_of_birth')->get();
        foreach($address_of_birth as $address_of_birth_val ){
            $this->address_of_birth[] = $address_of_birth_val['values'];
        }
        $status_health_orphan = RecordsConstant::where('type_constant','=','status_health_orphan')->get();
        foreach($status_health_orphan as $status_health_orphan_val ){
            $this->status_health_orphan[] = $status_health_orphan_val['values'];
        }
        $child_orphaned_parents = RecordsConstant::where('type_constant','=','child_orphaned_parents')->get();
        foreach($child_orphaned_parents as $child_orphaned_parents_val ){
            $this->child_orphaned_parents[] = $child_orphaned_parents_val['values'];
        }
        $CH_house = RecordsConstant::where('type_constant','=','CH_house')->get();
        foreach($CH_house as $CH_house_val ){
            $this->CH_house[] = $CH_house_val['values'];
        }
        $orphan_displaced = RecordsConstant::where('type_constant','=','orphan_displaced')->get();
        foreach($orphan_displaced as $orphan_displaced_val ){
            $this->orphan_displaced[] = $orphan_displaced_val['values'];
        }
        $livery = RecordsConstant::where('type_constant','=','livery')->get();
        foreach($livery as $livery_val ){
            $this->livery[] = $livery_val['values'];
        }
        $financial_aid = RecordsConstant::where('type_constant','=','financial_aid')->get();
        foreach($financial_aid as $financial_aid_val ){
            $this->financial_aid[] = $financial_aid_val['values'];
        }
        $guardian_RWOs = RecordsConstant::where('type_constant','=','guardian_RWOs')->get();
        foreach($guardian_RWOs as $guardian_RWO ){
            $this->guardian_RWOs[] = $guardian_RWO['values'];
        }
        $this->date_of_birth = RecordsConstant::where('type_constant','=','date_of_birth')->get();
    }
}
