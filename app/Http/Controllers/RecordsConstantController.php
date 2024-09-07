<?php

namespace App\Http\Controllers;

use App\Models\RecordsConstant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
class RecordsConstantController extends Controller
{
    use AuthorizesRequests;
    public function index(){
        $this->authorize('viewAny',RecordsConstant::class);
        $date_of_birth = RecordsConstant::where('type_constant','=','date_of_birth')->get();
        $gender = RecordsConstant::where('type_constant','=','gender')->get();
        $provinces = RecordsConstant::where('type_constant','=','provinces')->get();
        $cities = RecordsConstant::where('type_constant','=','cities')->get();
        $address_of_birth = RecordsConstant::where('type_constant','=','address_of_birth')->get();
        $guardian_RWOs = RecordsConstant::where('type_constant','=','guardian_RWOs')->get();
        $status_health_orphan = RecordsConstant::where('type_constant','=','status_health_orphan')->get();
        $child_orphaned_parents = RecordsConstant::where('type_constant','=','child_orphaned_parents')->get();
        $CH_house = RecordsConstant::where('type_constant','=','CH_house')->get();
        $orphan_displaced = RecordsConstant::where('type_constant','=','orphan_displaced')->get();
        $livery = RecordsConstant::where('type_constant','=','livery')->get();
        $financial_aid = RecordsConstant::where('type_constant','=','financial_aid')->get();
        $recordsConstants = RecordsConstant::get();

        $date_of_birth_1 = strtotime($date_of_birth[0]['values']);
        $date_of_birth_f = date('Y-m-d',$date_of_birth_1);
        return view('dashboard.recordsConstants',compact('recordsConstants','gender','date_of_birth_f','provinces','cities','address_of_birth','guardian_RWOs','status_health_orphan','child_orphaned_parents','CH_house','orphan_displaced','livery','financial_aid'));
    }
    public function store(Request $request){
        $this->authorize('create',RecordsConstant::class);
        // dd($request->post('new-gender'));
        if($request->post('date_of_birth') != null){
            $date_of_birth = $request->post('date_of_birth');
            $date_of_birth_d = RecordsConstant::where('type_constant','=','date_of_birth')->get();
            if(isset($old_gender[0]) == false){
                $date_of_birth_f = RecordsConstant::findOrFail($date_of_birth_d[0]['id']);
                $date_of_birth_f->update([
                    'values' => $date_of_birth,
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم تحديث التاريخ ');
            }
        }
        if($request->post('new-gender') != null){
            $new_gender = $request->post('new-gender');
            $old_gender = RecordsConstant::where('type_constant','=','gender')
                                            ->where('values','=',$new_gender)->get();
            if(isset($old_gender[0]) == false){
                RecordsConstant::create([
                    'type_constant' => 'gender',
                    'values' => $new_gender
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم إضافة قيمة جديدة');
            }else{
                return redirect()->route('records-recordsConstants')
                        ->with('danger','هذه القيمة موجودة حاليا');
            }
        }
        if($request->post('new-province') != null){
            $new_province = $request->post('new-province');
            $old_province = RecordsConstant::where('type_constant','=','provinces')
                                            ->where('values','=',$new_province)->get();
            if(isset($old_province[0]) == false){
                RecordsConstant::create([
                    'type_constant' => 'provinces',
                    'values' => $new_province
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم إضافة قيمة جديدة');
            }else{
                return redirect()->route('records-recordsConstants')
                        ->with('danger','هذه القيمة موجودة حاليا');
            }
        }
        if($request->post('new-city') != null){
            $new_city = $request->post('new-city');
            $old_city = RecordsConstant::where('type_constant','=','cities')
                                            ->where('values','=',$new_city)->get();
            if(isset($old_city[0]) == false){
                RecordsConstant::create([
                    'type_constant' => 'cities',
                    'values' => $new_city
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم إضافة قيمة جديدة');
            }else{
                return redirect()->route('records-recordsConstants')
                        ->with('danger','هذه القيمة موجودة حاليا');
            }
        }
        if($request->post('new-address_of_birth') != null){
            $new_address_of_birth = $request->post('new-address_of_birth');
            $old_address_of_birth = RecordsConstant::where('type_constant','=','address_of_birth')
                                            ->where('values','=',$new_address_of_birth)->get();
            if(isset($old_address_of_birth[0]) == false){
                RecordsConstant::create([
                    'type_constant' => 'address_of_birth',
                    'values' => $new_address_of_birth
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم إضافة قيمة جديدة');
            }else{
                return redirect()->route('records-recordsConstants')
                        ->with('danger','هذه القيمة موجودة حاليا');
            }
        }
        if($request->post('new-guardian_RWO') != null){
            $new_guardian_RWO = $request->post('new-guardian_RWO');
            $old_guardian_RWO = RecordsConstant::where('type_constant','=','guardian_RWOs')
                                            ->where('values','=',$new_guardian_RWO)->get();
            if(isset($old_guardian_RWO[0]) == false){
                RecordsConstant::create([
                    'type_constant' => 'guardian_RWOs',
                    'values' => $new_guardian_RWO
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم إضافة قيمة جديدة');
            }else{
                return redirect()->route('records-recordsConstants')
                        ->with('danger','هذه القيمة موجودة حاليا');
            }
        }
        if($request->post('new-status_health_orphan') != null){
            $new_status_health_orphan = $request->post('new-status_health_orphan');
            $old_status_health_orphan = RecordsConstant::where('type_constant','=','status_health_orphan')
                                            ->where('values','=',$new_status_health_orphan)->get();
            if(isset($old_status_health_orphan[0]) == false){
                RecordsConstant::create([
                    'type_constant' => 'status_health_orphan',
                    'values' => $new_status_health_orphan
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم إضافة قيمة جديدة');
            }else{
                return redirect()->route('records-recordsConstants')
                        ->with('danger','هذه القيمة موجودة حاليا');
            }
        }
        if($request->post('new-child_orphaned_parents') != null){
            $new_child_orphaned_parents = $request->post('new-child_orphaned_parents');
            $old_child_orphaned_parents = RecordsConstant::where('type_constant','=','child_orphaned_parents')
                                            ->where('values','=',$new_child_orphaned_parents)->get();
            if(isset($old_child_orphaned_parents[0]) == false){
                RecordsConstant::create([
                    'type_constant' => 'child_orphaned_parents',
                    'values' => $new_child_orphaned_parents
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم إضافة قيمة جديدة');
            }else{
                return redirect()->route('records-recordsConstants')
                        ->with('danger','هذه القيمة موجودة حاليا');
            }
        }
        if($request->post('new-CH_house') != null){
            $new_CH_house = $request->post('new-CH_house');
            $old_CH_house = RecordsConstant::where('type_constant','=','CH_house')
                                            ->where('values','=',$new_CH_house)->get();
            if(isset($old_CH_house[0]) == false){
                RecordsConstant::create([
                    'type_constant' => 'CH_house',
                    'values' => $new_CH_house
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم إضافة قيمة جديدة');
            }else{
                return redirect()->route('records-recordsConstants')
                        ->with('danger','هذه القيمة موجودة حاليا');
            }
        }
        if($request->post('new-orphan_displaced') != null){
            $new_orphan_displaced = $request->post('new-orphan_displaced');
            $old_orphan_displaced = RecordsConstant::where('type_constant','=','orphan_displaced')
                                            ->where('values','=',$new_orphan_displaced)->get();
            if(isset($old_orphan_displaced[0]) == false){
                RecordsConstant::create([
                    'type_constant' => 'orphan_displaced',
                    'values' => $new_orphan_displaced
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم إضافة قيمة جديدة');
            }else{
                return redirect()->route('records-recordsConstants')
                        ->with('danger','هذه القيمة موجودة حاليا');
            }
        }
        if($request->post('new-livery') != null){
            $new_livery = $request->post('new-livery');
            $old_livery = RecordsConstant::where('type_constant','=','livery')
                                            ->where('values','=',$new_livery)->get();
            if(isset($old_livery[0]) == false){
                RecordsConstant::create([
                    'type_constant' => 'livery',
                    'values' => $new_livery
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم إضافة قيمة جديدة');
            }else{
                return redirect()->route('records-recordsConstants')
                        ->with('danger','هذه القيمة موجودة حاليا');
            }
        }
        if($request->post('new-financial_aid') != null){
            $new_financial_aid = $request->post('new-financial_aid');
            $old_financial_aid = RecordsConstant::where('type_constant','=','financial_aid')
                                            ->where('values','=',$new_financial_aid)->get();
            if(isset($old_financial_aid[0]) == false){
                RecordsConstant::create([
                    'type_constant' => 'financial_aid',
                    'values' => $new_financial_aid
                ]);
                return redirect()->route('records-recordsConstants')
                        ->with('success','تم إضافة قيمة جديدة');
            }else{
                return redirect()->route('records-recordsConstants')
                        ->with('danger','هذه القيمة موجودة حاليا');
            }
        }
        return redirect()->route('records-recordsConstants');
    }
    public function destroy(Request $request)
    {
        $this->authorize('delete',RecordsConstant::class);

        if($request->post('old-gender') != null){
            $old_gender = $request->post('old-gender');
            $old_gender = RecordsConstant::where('type_constant','=','gender')
                                            ->where('values','=',$old_gender)->get();
            if($old_gender != null){
                $orphanRecord = RecordsConstant::findOrFail($old_gender[0]['id']);
                $orphanRecord->delete();
            }
        }
        if($request->post('old-province') != null){
            $old_province = $request->post('old-province');
            $old_province = RecordsConstant::where('type_constant','=','provinces')
                                            ->where('values','=',$old_province)->get();
            if($old_province != null){
                $orphanRecord = RecordsConstant::findOrFail($old_province[0]['id']);
                $orphanRecord->delete();
            }
        }
        if($request->post('old-city') != null){
            $old_city = $request->post('old-city');
            $old_city = RecordsConstant::where('type_constant','=','cities')
                                            ->where('values','=',$old_city)->get();
            if($old_city != null){
                $orphanRecord = RecordsConstant::findOrFail($old_city[0]['id']);
                $orphanRecord->delete();
            }
        }
        if($request->post('old-address_of_birth') != null){
            $old_address_of_birth = $request->post('old-address_of_birth');
            $old_address_of_birth = RecordsConstant::where('type_constant','=','address_of_birth')
                                            ->where('values','=',$old_address_of_birth)->get();
            if($old_address_of_birth != null){
                $orphanRecord = RecordsConstant::findOrFail($old_address_of_birth[0]['id']);
                $orphanRecord->delete();
            }
        }
        if($request->post('old-guardian_RWO') != null){
            $old_guardian_RWO = $request->post('old-guardian_RWO');
            $old_guardian_RWO = RecordsConstant::where('type_constant','=','guardian_RWOs')
                                            ->where('values','=',$old_guardian_RWO)->get();
            if($old_guardian_RWO != null){
                $orphanRecord = RecordsConstant::findOrFail($old_guardian_RWO[0]['id']);
                $orphanRecord->delete();
            }
        }
        if($request->post('old-status_health_orphan') != null){
            $old_status_health_orphan = $request->post('old-status_health_orphan');
            $old_status_health_orphan = RecordsConstant::where('type_constant','=','status_health_orphan')
                                            ->where('values','=',$old_status_health_orphan)->get();
            if($old_status_health_orphan != null){
                $orphanRecord = RecordsConstant::findOrFail($old_status_health_orphan[0]['id']);
                $orphanRecord->delete();
            }
        }
        if($request->post('old-child_orphaned_parents') != null){
            $old_child_orphaned_parents = $request->post('old-child_orphaned_parents');
            $old_child_orphaned_parents = RecordsConstant::where('type_constant','=','child_orphaned_parents')
                                            ->where('values','=',$old_child_orphaned_parents)->get();
            if($old_child_orphaned_parents != null){
                $orphanRecord = RecordsConstant::findOrFail($old_child_orphaned_parents[0]['id']);
                $orphanRecord->delete();
            }
        }
        if($request->post('old-CH_house') != null){
            $old_CH_house = $request->post('old-CH_house');
            $old_CH_house = RecordsConstant::where('type_constant','=','CH_house')
                                            ->where('values','=',$old_CH_house)->get();
            if($old_CH_house != null){
                $orphanRecord = RecordsConstant::findOrFail($old_CH_house[0]['id']);
                $orphanRecord->delete();
            }
        }
        if($request->post('old-orphan_displaced') != null){
            $old_orphan_displaced = $request->post('old-orphan_displaced');
            $old_orphan_displaced = RecordsConstant::where('type_constant','=','orphan_displaced')
                                            ->where('values','=',$old_orphan_displaced)->get();
            if($old_orphan_displaced != null){
                $orphanRecord = RecordsConstant::findOrFail($old_orphan_displaced[0]['id']);
                $orphanRecord->delete();
            }
        }
        if($request->post('old-livery') != null){
            $old_livery = $request->post('old-livery');
            $old_livery = RecordsConstant::where('type_constant','=','livery')
                                            ->where('values','=',$old_livery)->get();
            if($old_livery != null){
                $orphanRecord = RecordsConstant::findOrFail($old_livery[0]['id']);
                $orphanRecord->delete();
            }
        }
        if($request->post('old-financial_aid') != null){
            $old_financial_aid = $request->post('old-financial_aid');
            $old_financial_aid = RecordsConstant::where('type_constant','=','financial_aid')
                                            ->where('values','=',$old_financial_aid)->get();
            if($old_financial_aid != null){
                $orphanRecord = RecordsConstant::findOrFail($old_financial_aid[0]['id']);
                $orphanRecord->delete();
            }
        }
        return redirect()->route('records-recordsConstants')
            ->with('success','تم حذف القيمة بنجاح');
    }
}
