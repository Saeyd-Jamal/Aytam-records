<?php

namespace App\Imports;

use App\Models\Record;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RecordImportError implements ToModel , WithHeadingRow
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
            'first_name' => $row['asm_alytym'],
            'father_name' => $row['asm_alab'],
            'grandfather_name' => $row['asm_algd'],
            'family_name' => $row['asm_alaaayl'],
            'gender' => $row['algns'],
            'orphan_id' => $row['rkm_hoy_alytym'],
            'date_of_birth' => Record::convertDateExcel($row['tarykh_almylad']),
            'age' => $orphan_age,
            'address_of_birth' => $row['mkan_almylad'],
            'status_health_orphan' => $row['alhal_alshy_llytym'],
            'health_status_notes' => $row['mlahthat_alytym_almryd'],
            'child_orphaned_parents' => $row['hl_altfl_ytym_alaboyn'],
            'N_brothers' => $row['aadd_alakho_althkor'],
            'N_sisters' => $row['aadd_alakho_alanath'],
            'notes_orphan' => $row['mlahthat_aan_alytym'],

            'first_deceased_name' => $row['asm_almtof'],
            'father_deceased_name' => $row['asm_oald_almtofy'],
            'grandfather_deceased_name' => $row['asm_gd_almtofy'],
            'family_deceased_name' => $row['asm_aaayl_almtofy'],
            'Id_father' => $row['rkm_hoy_alab'],
            'DFB_father' => Record::convertDateExcel($row['tarykh_mylad_alab']),
            'date_of_death' => Record::convertDateExcel($row['tarykh_alofa']),
            'cause_of_death' => $row['sbb_alofa'],


            'first_mother_name' => $row['asm_alam'],
            'father_mother_name' => $row['asm_oald_alam'],
            'grandfather_mother_name' => $row['asm_gd_alam'],
            'family_mother_name' => $row['asm_aaayl_alam'],
            'Id_mother' => $row['rkm_hoy_alam'],
            'DMB_mother' => Record::convertDateExcel($row['tarykh_mylad_alam']),
            'DMD_mother' => Record::convertDateExcel($row['tarykh_ofa_alam']),
            'CMD_mother' => $row['sbb_ofa_alam'],
            'mother_social_situation' => $row['alhal_alagtmaaay_llam'],


            'first_guardian_name' => $row['asm_oly_alamr'],
            'father_guardian_name' => $row['asm_oald_oly_alamr'],
            'grandfather_guardian_name' => $row['asm_gd_oly_alamr'],
            'family_guardian_name' => $row['asm_aaayl_oly_alamr'],
            'guardian_RWO' => $row['sl_alkrab_balytym'],
            'guardian_id' => $row['hoy_oly_alamr'],
            'DGM_guardian' => Record::convertDateExcel($row['tarykh_mylad_oly_alamr']),
            'guardian_scientific_qualification' => $row['almohl_alaalmy_loly_alamr'],
            'guardian_work' => $row['aaml_oly_alamr'],
            'mobile_number1' => $row['rkm_goal_1'],
            'mobile_number2' => $row['rkm_goal_2'],
            'WhatsApp_number' => $row['rkm_oats'],


            'CH_house' => $row['odaa_albyt'],
            'p_province' => $row['almhafth_alsabk'],
            'p_city' => $row['almdyn_alsabk'],
            'p_address' => $row['almhafth_alhaly'],
            'c_province' => $row['almdyn_alhaly'],
            'c_city' => $row['alaanoan_alhaly_baltfsyl'],
            'c_address' => $row['alaanoan_alhaly_baltfsyl'],
            'orphan_displaced' => $row['hl_alytym_nazh'],

            
            'livery' => $row['astfadkso'],
            'financial_aid' => $row['astfadkfal'],
            'data_portal' => $request->user()->id,
            'data_portal_name' => $row['mdkhl_albyanat'],
            'section' => $row['alfraa'],
        ]);
    }
    public function chunkSize(): int
    {
        return 500; // حجم القطعة الواحدة
    }
}
