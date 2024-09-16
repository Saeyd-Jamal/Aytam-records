<?php

namespace App\Imports;

use App\Models\Record;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RecordImportError implements ToModel,WithHeadingRow
{
    protected $orphan_id;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $row)
    {
        if(gettype($row['tarykh_almylad']) == 'integer'){
            $time = strtotime(Record::convertDateExcel($row['tarykh_almylad']));
            $newformat = date('Y',$time);
            $orphan_age = Carbon::now()->format('Y') - $newformat;
        }else{
            $orphan_age = 1;
        }


        $request = request();
        return new Record([
                'name' => $row['asm_alytym_rbaaay'],
                'gender' => $row['algns'],
                'orphan_id' => $row['rkm_hoy_alytym'],
                'date_of_birth' => Record::convertDateExcel($row['tarykh_almylad']),
                'address_of_birth' => $row['mkan_almylad'],
                'orphan_age' => $orphan_age,
                'Id_father' => $row['rkm_hoy_alab'],
                'DFB_father' => Record::convertDateExcel($row['tarykh_mylad_alab']),
                'mother_name' => $row['asm_alam_rbaaay'],
                'Id_mother' => $row['rkm_hoy_alam'],
                'DMB_mother' => Record::convertDateExcel($row['tarykh_mylad_alam']),
                'guardian_name' => $row['asm_oly_alamr'],
                'guardian_RWO' => $row['sl_alkrab_balytym'],
                'guardian_id' => $row['hoy_oly_alamr'],
                'guardian_work' => $row['alaaml'],
                'guardian_scientific_qualification' => $row['almohl_alaalmy'],
                'DGM_guardian' => Record::convertDateExcel($row['tarykh_mylad_oly_alamr']),
                'status_health_orphan' => $row['alhal_alshy_llytym'],
                'health_status_notes' => $row['mlahthat_alytym_almryd'],
                'deceased_name' => $row['asm_almtof'],
                'date_of_death' => Record::convertDateExcel($row['tarykh_alofa']),
                'cause_of_death' => $row['sbb_alofa'],
                'child_orphaned_parents' => $row['hl_altfl_ytym_alaboyn'],
                'DMD_mother' => Record::convertDateExcel($row['tarykh_ofa_alam']),
                'CMD_mother' => $row['sbb_ofa_alam'],
                'N_brothers' => $row['aadd_alakho_althkor'],
                'N_sisters' => $row['aadd_alakho_alanath'],
                'CH_house' => $row['odaa_albyt'],
                'p_province' => $row['almhafth_alsabk'],
                'p_city' => $row['almdyn_alsabk'],
                'p_address' => $row['almhafth_alhaly'],
                'c_province' => $row['almdyn_alhaly'],
                'c_city' => $row['alaanoan_alhaly_baltfsyl'],
                'c_address' => $row['alaanoan_alhaly_baltfsyl'],
                'orphan_displaced' => $row['hl_alytym_nazh'],
                'mobile_number1' => $row['rkm_goal_1'],
                'mobile_number2' => $row['rkm_goal_2'],
                'WhatsApp_number' => $row['rkm_oats'],
                'livery' => $row['astfadkso'],
                'financial_aid' => $row['astfadkfal'],
                'notes_orphan' => $row['mlahthat_aan_alytym'],
                'data_portal' => $request->user()->id,
                'data_portal_name' => $row['mdkhl_albyanat']
        ]);
    }
    public function chunkSize(): int
    {
        return 500; // حجم القطعة الواحدة
    }
}
