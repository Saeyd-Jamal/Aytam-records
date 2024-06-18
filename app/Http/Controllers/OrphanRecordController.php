<?php

namespace App\Http\Controllers;

use App\Exports\OrphanRecordExport;
use App\Imports\OrphanRecordImport;
use App\Imports\OrphanRecordImportError;
use App\Models\OrphanRecord;
use App\Models\RecordsConstant;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class OrphanRecordController extends Controller
{
    protected $causes_of_death = ['شهيد','وفاء طبيعية'];
    protected $gender = [];
    protected $provinces = [] ;
    protected $cities = [] ;
    protected $address_of_birth = [] ;
    protected $status_health_orphan =[] ;
    protected $child_orphaned_parents =[];
    protected $CH_house = [];
    protected $orphan_displaced =[];
    protected $livery =[];
    protected $financial_aid =[];
    protected $guardian_RWOs =[];
    protected $date_of_birth ;

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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $causes_of_death = $this->causes_of_death;
        $provinces = $this->provinces;
        $cities = $this->cities;
        $address_of_birth = $this->address_of_birth;
        $status_health_orphan = $this->status_health_orphan;
        $child_orphaned_parents = $this->child_orphaned_parents;
        $CH_house = $this->CH_house;
        $orphan_displaced = $this->orphan_displaced;
        $livery = $this->livery;
        $financial_aid = $this->financial_aid;
        $users = User::get();
        $orphanRecords = OrphanRecord::paginate(10);
        return view('dashboard.orphan_records.index', compact('orphanRecords','users','address_of_birth','financial_aid','CH_house','livery','orphan_displaced','provinces','cities','status_health_orphan','causes_of_death','child_orphaned_parents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $causes_of_death = $this->causes_of_death;
        $provinces = $this->provinces;
        $cities = $this->cities;
        $address_of_birth = $this->address_of_birth;
        $status_health_orphan = $this->status_health_orphan;
        $child_orphaned_parents = $this->child_orphaned_parents;
        $CH_house = $this->CH_house;
        $orphan_displaced = $this->orphan_displaced;
        $livery = $this->livery;
        $financial_aid = $this->financial_aid;
        $guardian_RWOs = $this->guardian_RWOs;
        $date_of_birth = Carbon::parse($this->date_of_birth[0]['values'])->format('Y-m-d');
        $date_of_birth_to = now()->format('Y-m-d');

        $orphanRecord = new OrphanRecord;
        return view('dashboard.orphan_records.reception',compact('orphanRecord','date_of_birth_to','date_of_birth','address_of_birth','guardian_RWOs','financial_aid','CH_house','livery','orphan_displaced','provinces','cities','status_health_orphan','causes_of_death','child_orphaned_parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try{
            $request->validate([
                'orphan_id' => [
                    'required',
                    "unique:orphan_records,orphan_id,$request->orphan_id"
                ],
            ],[
                'required'=> 'This field (:attribute) is required'
            ]);
            $age = Carbon::now()->format('Y') - Carbon::parse($request->post('date_of_birth'))->format('Y');
            $request->merge([
                'name' => $request->post('first_name') . " " . $request->post('father_name') . " " . $request->post('grandfather_name') . " " . $request->post('family_name'),
                'orphan_age'=> $age ,
                'data_portal' => $request->user()->id,
                'data_portal_name' => $request->user()->name,
            ]);
            OrphanRecord::create($request->all());
    
            return redirect()->route('orphans_records.index')
                ->with('success','تم إضافة بيانات يتيم جديد');
        }
        catch(Exception $e){
            return redirect()->back()->with('danger','هنالك خطأ في الإدخال يرجى التحقق من البيانات المدخلة إن إستمرت المشكلة يرجى التواصل مع المهندس');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $causes_of_death = $this->causes_of_death;
        $provinces = $this->provinces;
        $cities = $this->cities;
        $address_of_birth = $this->address_of_birth;
        $status_health_orphan = $this->status_health_orphan;
        $child_orphaned_parents = $this->child_orphaned_parents;
        $CH_house = $this->CH_house;
        $orphan_displaced = $this->orphan_displaced;
        $livery = $this->livery;
        $financial_aid = $this->financial_aid;
        $guardian_RWOs = $this->guardian_RWOs;
        $date_of_birth = Carbon::parse($this->date_of_birth[0]['values'])->format('Y-m-d');
        $date_of_birth_to = now()->format('Y-m-d');
        $button_label = 'تعديل';
        $editData = true;
        $orphanRecord = OrphanRecord::findOrFail($id);
        return view('dashboard.orphan_records.orphan',compact('orphanRecord','editData','date_of_birth_to','date_of_birth','address_of_birth','guardian_RWOs','financial_aid','CH_house','livery','orphan_displaced','provinces','cities','status_health_orphan','causes_of_death','child_orphaned_parents','button_label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $orphanRecord = OrphanRecord::findOrFail($id);
            $age = Carbon::now()->format('Y') - Carbon::parse($request->post('date_of_birth'))->format('Y');
            $request->merge([
                'orphan_age'=> $age ,
            ]);
            // update the fields shared
            $guardian_id = $orphanRecord->guardian_id;
            $orphans_guardian = OrphanRecord::where('guardian_id',$guardian_id)->get();
            if($request->post('guardian_name') != $orphanRecord->guardian_name){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->guardian_name = $request->post('guardian_name');
                    $orphan_guardian->save();
                }
            }
            if($request->post('guardian_id') != $orphanRecord->guardian_id){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->guardian_id = $request->post('guardian_id');
                    $orphan_guardian->save();
                }
            }
            if($request->post('DGM_guardian') != $orphanRecord->DGM_guardian){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->DGM_guardian = $request->post('DGM_guardian');
                    $orphan_guardian->save();
                }
            }
            if($request->post('mobile_number1') != $orphanRecord->mobile_number1){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->mobile_number1 = $request->post('mobile_number1');
                    $orphan_guardian->save();
                }
            }
            if($request->post('mobile_number2') != $orphanRecord->mobile_number2){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->mobile_number2 = $request->post('mobile_number2');
                    $orphan_guardian->save();
                }
            }
            if($request->post('WhatsApp_number') != $orphanRecord->WhatsApp_number){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->WhatsApp_number = $request->post('WhatsApp_number');
                    $orphan_guardian->save();
                }
            }
            if($request->post('p_province') != $orphanRecord->p_province){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->p_province = $request->post('p_province');
                    $orphan_guardian->save();
                }
            }
            if($request->post('p_city') != $orphanRecord->p_city){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->p_city = $request->post('p_city');
                    $orphan_guardian->save();
                }
            }
            if($request->post('p_address') != $orphanRecord->p_address){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->p_address = $request->post('p_address');
                    $orphan_guardian->save();
                }
            }
            if($request->post('orphan_displaced') != $orphanRecord->orphan_displaced){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->orphan_displaced = $request->post('orphan_displaced');
                    $orphan_guardian->save();
                }
            }
            if($request->post('c_province') != $orphanRecord->c_province){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->c_province = $request->post('c_province');
                    $orphan_guardian->save();
                }
            }
            if($request->post('c_city') != $orphanRecord->c_city){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->c_city = $request->post('c_city');
                    $orphan_guardian->save();
                }
            }
            if($request->post('c_address') != $orphanRecord->c_address){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->c_address = $request->post('c_address');
                    $orphan_guardian->save();
                }
            }
            if($request->post('CH_house') != $orphanRecord->CH_house){
                foreach ($orphans_guardian as $orphan_guardian){
                    $orphan_guardian->CH_house = $request->post('CH_house');
                    $orphan_guardian->save();
                }
            }
            $Id_mother = $orphanRecord->Id_mother;
            $orphans_mother = OrphanRecord::where('Id_mother',$Id_mother)->get();
            if($request->post('Id_father') != $orphanRecord->Id_father){
                foreach ($orphans_mother as $orphan_mother){
                    $orphan_mother->Id_father = $request->post('Id_father');
                    $orphan_mother->save();
                }
            }
            if($request->post('DFB_father') != $orphanRecord->DFB_father){
                foreach ($orphans_mother as $orphan_mother){
                    $orphan_mother->DFB_father = $request->post('DFB_father');
                    $orphan_mother->save();
                }
            }
            if($request->post('mother_name') != $orphanRecord->mother_name){
                foreach ($orphans_mother as $orphan_mother){
                    $orphan_mother->mother_name = $request->post('mother_name');
                    $orphan_mother->save();
                }
            }
            if($request->post('Id_mother') != $orphanRecord->Id_mother){
                foreach ($orphans_mother as $orphan_mother){
                    $orphan_mother->Id_mother = $request->post('Id_mother');
                    $orphan_mother->save();
                }
            }
            if($request->post('DMB_mother') != $orphanRecord->DMB_mother){
                foreach ($orphans_mother as $orphan_mother){
                    $orphan_mother->DMB_mother = $request->post('DMB_mother');
                    $orphan_mother->save();
                }
            }
            if($request->post('deceased_name') != $orphanRecord->deceased_name){
                foreach ($orphans_mother as $orphan_mother){
                    $orphan_mother->deceased_name = $request->post('deceased_name');
                    $orphan_mother->save();
                }
            }
            if($request->post('date_of_death') != $orphanRecord->date_of_death){
                foreach ($orphans_mother as $orphan_mother){
                    $orphan_mother->date_of_death = $request->post('date_of_death');
                    $orphan_mother->save();
                }
            }
            if($request->post('cause_of_death') != $orphanRecord->cause_of_death){
                foreach ($orphans_mother as $orphan_mother){
                    $orphan_mother->cause_of_death = $request->post('cause_of_death');
                    $orphan_mother->save();
                }
            }
            if($request->post('child_orphaned_parents') != $orphanRecord->child_orphaned_parents){
                foreach ($orphans_mother as $orphan_mother){
                    $orphan_mother->child_orphaned_parents = $request->post('child_orphaned_parents');
                    $orphan_mother->save();
                }
            }
            if($request->post('DMD_mother') != $orphanRecord->DMD_mother){
                foreach ($orphans_mother as $orphan_mother){
                    $orphan_mother->DMD_mother = $request->post('DMD_mother');
                    $orphan_mother->save();
                }
            }
            if($request->post('CMD_mother') != $orphanRecord->CMD_mother){
                foreach ($orphans_mother as $orphan_mother){
                    $orphan_mother->CMD_mother = $request->post('CMD_mother');
                    $orphan_mother->save();
                }
            }

            $orphanRecord->update($request->all());

            return redirect()->route('orphans_records.index')
                ->with('success','تم تديث بيانات اليتيم  بنجاح');
        }catch(Exception $e){
            return redirect()->back()->with('danger','هنالك خطأ في الإدخال يرجى التحقق من البيانات المدخلة إن إستمرت المشكلة يرجى التواصل مع المهندس');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $orphanRecord = OrphanRecord::findOrFail($id);
        $orphanRecord->delete();
        return redirect()->route('orphans_records.index')
            ->with('success','تم حذف بيانات اليتيم بنجاح');
    }

    public function checkID(Request $request){
        $orphan_id_val = $request->get('orphanId'); // val
        $orphan_id = OrphanRecord::where('orphan_id','=',"{$orphan_id_val}")->first();
        if($orphan_id){
            return "رقم الهوية لشخص اخر هل تريد تعديل بياناته " . "<a class='nav-link' href='".route('orphans_records.edit',$orphan_id['id'])."'>إضغط هنا</a>";
        }
    }
    public function filterError(Request $request){
        $type_error = $request->get('type_error');

        if($type_error == 'null'){
            $orphans = new OrphanRecord();
        }
        if($type_error == 'repeatId'){
            $duplicates_orphans = DB::table('orphan_records')
                                    ->select('name','gender','orphan_id','date_of_birth','orphan_age','guardian_name','guardian_RWO','guardian_id','status_health_orphan','deceased_name','date_of_death','p_province','p_city','child_orphaned_parents','N_brothers','N_sisters','mobile_number1','WhatsApp_number','livery','financial_aid', DB::raw('COUNT("id") as `count`'))
                                    ->groupBy('name')
                                    ->having('count', '>', 1)
                                    ->paginate();
            return $duplicates_orphans;
        }
        if($type_error == 'repeatName'){
            $duplicates_orphans = DB::table('orphan_records')
                                    ->select('name','gender','orphan_id','date_of_birth','orphan_age','guardian_name','guardian_RWO','guardian_id','status_health_orphan','deceased_name','date_of_death','p_province','p_city','child_orphaned_parents','N_brothers','N_sisters','mobile_number1','WhatsApp_number','livery','financial_aid', DB::raw('COUNT("name") as `count`'))
                                    ->groupBy('name')
                                    ->having('count', '>', 1)
                                    ->paginate();
            return $duplicates_orphans;
        }
        if($type_error == 'orphan_id'){
            $orphans = OrphanRecord::whereRaw("LENGTH(orphan_id) != 9");
        }
        if($type_error == 'Id_father'){
            $orphans = OrphanRecord::whereRaw("LENGTH(Id_father) != 9");
        }
        if($type_error == 'Id_mother'){
            $orphans = OrphanRecord::whereRaw("LENGTH(Id_mother) != 9");
        }
        if($type_error == 'guardian_id'){
            $orphans = OrphanRecord::whereRaw("LENGTH(guardian_id) != 9");
        }
        if($type_error == 'date_of_birth'){
            $orphans = OrphanRecord::where('date_of_birth', '<', $this->date_of_birth);
        }
        if($type_error == 'guardian_RWO'){
            $orphans = OrphanRecord::whereNotIn('guardian_RWO',$this->guardian_RWOs);
        }
        if($type_error == 'status_health_orphan'){
            $orphans = OrphanRecord::whereNotIn('status_health_orphan',$this->status_health_orphan);
        }
        if($type_error == 'cause_of_death'){
            $orphans = OrphanRecord::whereNotIn('cause_of_death',$this->causes_of_death);
        }
        if($type_error == 'CMD_mother'){
            $orphans = OrphanRecord::whereNotIn('CMD_mother',$this->causes_of_death);
        }
        if($type_error == 'CH_house'){
            $orphans = OrphanRecord::whereNotIn('CH_house',$this->CH_house);
        }
        if($type_error == 'p_province'){
            $orphans = OrphanRecord::whereNotIn('p_province',$this->provinces);
        }
        if($type_error == 'p_city'){
            $orphans = OrphanRecord::whereNotIn('p_city',$this->cities);
        }
        if($type_error == 'c_province'){
            $orphans = OrphanRecord::whereNotIn('c_province',$this->provinces);
        }
        if($type_error == 'c_city'){
            $orphans = OrphanRecord::whereNotIn('c_city',$this->cities);
        }
        if($type_error == 'orphan_displaced'){
            $orphans = OrphanRecord::whereNotIn('orphan_displaced',$this->orphan_displaced);
        }
        if($type_error == 'mobile_number1'){
            $orphans = OrphanRecord::whereRaw("LENGTH(mobile_number1) != 10");
        }

        return $orphans->paginate(10);
    }

    // filter records
    public function getData(Request $request){
        $orphan_search_id = $request->get('orphan_search_id');
        $orphan_search_name = $request->get('orphan_search_name');
        $orphan_search_p_province = $request->get('orphan_search_p_province');
        $orphan_search_p_city = $request->get('orphan_search_p_city');
        $orphan_search_c_province = $request->get('orphan_search_c_province');
        $orphan_search_c_city = $request->get('orphan_search_c_city');
        $orphan_search_mother_name = $request->get('orphan_search_mother_name');
        $orphan_search_deceased_name = $request->get('orphan_search_deceased_name');
        $orphan_search_cause_of_death = $request->get('orphan_search_cause_of_death');
        $orphan_search_status = $request->get('orphan_search_status');
        $orphan_search_child_orphaned_parents = $request->get('orphan_search_child_orphaned_parents');
        $orphan_search_CH_house = $request->get('orphan_search_CH_house');
        $orphan_search_from_date = $request->get('orphan_search_from_date');
        $orphan_search_to_date = $request->get('orphan_search_to_date');
        $orphan_search_orphan_displaced = $request->get('orphan_search_orphan_displaced');
        $orphan_search_livery = $request->get('orphan_search_livery');
        $orphan_search_financial_aid = $request->get('orphan_search_financial_aid');
        $orphan_search_created_at_from = $request->get('orphan_search_created_at_from');
        $orphan_search_created_at_to = $request->get('orphan_search_created_at_to');
        $orphan_search_data_portal = $request->post('orphan_search_data_portal');


        $orphans = OrphanRecord::select('*');
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
        if($orphan_search_from_date == null){
            $orphans->where('date_of_birth', '>=', $this->date_of_birth);
        }
        if($orphan_search_to_date == null){
            $orphans->where('date_of_birth', '<=', now());
        }
        if($orphan_search_from_date != null){
            $orphans->where('date_of_birth', '>=', $orphan_search_from_date);
        }
        if($orphan_search_to_date != null){
            $orphans->where('date_of_birth', '<=', $orphan_search_to_date);
        }
        if($orphan_search_created_at_from == null){
            $orphans->where('created_at', '>=', '01-01-2000');
        }
        if($orphan_search_created_at_to == null){
            $orphans->where('created_at', '<=', now());
        }
        if($orphan_search_created_at_from == $orphan_search_created_at_to){
            $orphans->where('created_at',"<>", $orphan_search_created_at_from);
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


        return $orphans->paginate(20);
    }



    // file excel
    public function import(Request $request)
    {
        $file = $request->file('file');

        if($file == null){
            return redirect()->back()->with('error', 'لم يتم رفع الملف');
        }

        Excel::import(new OrphanRecordImport, $file);


        return redirect()->route('orphans_records.index')->with('success', 'تم رفع الملف');
    }

    public function export(Request $request)
    {
        $time = Carbon::now();
        $filename = 'سجلات الايتام' . $time .'.xlsx';
        return Excel::download(new OrphanRecordExport($request),$filename);
    }
}


