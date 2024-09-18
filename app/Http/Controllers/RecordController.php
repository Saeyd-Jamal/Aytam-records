<?php

namespace App\Http\Controllers;

use App\Imports\OrphanRecordImportError;
use App\Imports\RecordImportError;
use App\Models\Record;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class RecordController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Record::class);
        return view('dashboard.records.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Record::class);
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
        $record = new Record();
        return view('dashboard.records.create',compact('record', 'causes_of_death', 'provinces', 'cities', 'address_of_birth', 'status_health_orphan', 'child_orphaned_parents', 'CH_house', 'orphan_displaced', 'guardian_RWOs', 'date_of_birth', 'date_of_birth_to'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Record::class);
        DB::beginTransaction();
        try{
            $aytam_count = $request->post('aytam_count');
            $data = $request;
            for($i = 1; $i <= $aytam_count; $i++){
                $age = Carbon::now()->format('Y') - Carbon::parse($request->post('date_of_birth_' . $i))->format('Y');

                $data->except(['orphan_age',"name","gender",'orphan_id','date_of_birth','address_of_birth','notes_orphan','status_health_orphan','health_status_notes','child_orphaned_parents','mother_name','Id_mother','DMB_mother']);
                $data->merge([
                    'orphan_age'=> $age ,
                    "name" => $request->post('name_' . $i),
                    "gender" => $request->post('gender_' . $i),
                    "orphan_id" => $request->post('orphan_id_' . $i),
                    "date_of_birth" => $request->post('date_of_birth_' . $i),
                    "address_of_birth" => $request->post('address_of_birth_' . $i),
                    "notes_orphan" => $request->post('notes_orphan_' . $i),
                    "status_health_orphan" => $request->post('status_health_orphan_' . $i),
                    "health_status_notes" => $request->post('health_status_notes_' . $i),
                    "child_orphaned_parents" => $request->post('child_orphaned_parents_' . $i),
                    "mother_name" => $request->post('mother_name_' . $i),
                    "Id_mother" => $request->post('Id_mother_' . $i),
                    "DMB_mother" => $request->post('DMB_mother_' . $i),
                    'data_portal' => $request->user()->id,
                    'data_portal_name' => $request->user()->name
                ]);

                $haveOrphan = Record::where('orphan_id', $request->post('orphan_id_' . $i))->first();
                if($haveOrphan){
                    return redirect()->back()->with('danger','هذا اليتيم موجود بالفعل');
                }
                Record::create(
                    $data->all()
                );
            }
            DB::commit();
            return redirect()->route('records.index')
                ->with('success','تم إضافة بيانات يتيم جديد');
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('danger','هنالك خطأ في الإدخال يرجى التحقق من البيانات المدخلة إن إستمرت المشكلة يرجى التواصل مع المهندس');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        $this->authorize('update', Record::class);
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

        $editData = true;
        $btn_label = 'تعديل';
        return view('dashboard.records.edit',compact('record', 'causes_of_death', 'provinces', 'cities', 'address_of_birth', 'status_health_orphan', 'child_orphaned_parents', 'CH_house', 'orphan_displaced', 'guardian_RWOs', 'date_of_birth', 'date_of_birth_to', 'editData', 'btn_label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $this->authorize('update', Record::class);
        try{
            $request->validate([
                'orphan_id' => [
                    'required',
                    "unique:orphan_records,orphan_id,$request->orphan_id,orphan_id"
                ],
            ],[
                'required'=> 'هذا الحقل (:attribute) مطلوب',
                'orphan_id.unique' => 'هذه الهوية موجودة مسبقا'
            ]);

            $age = Carbon::now()->format('Y') - Carbon::parse($request->post('date_of_birth'))->format('Y');
            $request->merge([
                'orphan_age'=> $age ,
            ]);
            $record->update($request->all());

            return redirect()->route('records.index')->with('success','تم تحديث بيانات اليتيم بنجاح');
        }catch(Exception $e){
            // throw $e;
            return redirect()->back()->with('danger','هنالك خطأ في الإدخال يرجى التحقق من البيانات المدخلة إن إستمرت المشكلة يرجى التواصل مع المهندس');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        $this->authorize('delete', Record::class);
        $record->delete();
        return redirect()->route('records.index')->with('success','تم حذف بيانات اليتيم بنجاح');
    }

    public function checkID(Request $request){
        $orphan_id_val = $request->get('orphanId'); // val
        $orphan_id = Record::where('orphan_id','=',"{$orphan_id_val}")->first();
        if($orphan_id != null){
            return "رقم الهوية لشخص اخر هل تريد تعديل بياناته " . "<a class='nav-link' href='".route('records.edit',$orphan_id['id'])."'>إضغط هنا</a>";
        }
    }

    // file excel
    public function import(Request $request)
    {
        $this->authorize('import', Record::class);
        $file = $request->file('file');
        if($file == null){
            return redirect()->back()->with('danger', 'لم يتم رفع الملف');
        }
        Excel::import(new RecordImportError, $file);
        return redirect()->route('records.index')->with('success', 'تم رفع الملف');
    }

    public function convertDateExcel($date){
        if (is_numeric($date)) { // تأكد من أن القيمة رقمية
            $unix_date = ($date - 25569) * 86400;
            $date_f = gmdate("Y-m-d", $unix_date);
            return $date_f;
        } else {
            return $date; // إذا كانت القيمة غير رقمية، أرجعها كما هي
        }
    }

    public function editAge(Request $request)
    {
        try {
            $records = Record::get();
            foreach ($records as $record2) {
                $record = Record::findOrFail($record2->id);
                if(is_numeric($record->date_of_birth)){
                    $record->date_of_birth = $this->convertDateExcel($record->date_of_birth);
                }
                if(is_numeric($record->DMB_mother)){
                    $record->DMB_mother = $this->convertDateExcel($record->DMB_mother);
                }
                if(is_numeric($record->DGM_guardian)){
                    $record->DGM_guardian = $this->convertDateExcel($record->DGM_guardian);
                }
                if(is_numeric($record->date_of_death)){
                    $record->date_of_death = $this->convertDateExcel($record->date_of_death);
                }
                if(is_numeric($record->DMD_mother)){
                    $record->DMD_mother = $this->convertDateExcel($record->DMD_mother);
                }
                $record->save();
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        dd(Record::get());
        return redirect()->route('records.index')->with('success', 'تم رفع الملف');
    }
}
