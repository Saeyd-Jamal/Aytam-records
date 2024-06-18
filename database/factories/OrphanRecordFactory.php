<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrphanRecord>
 */
class OrphanRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['ذكر','أنثى']),
            'orphan_id' => rand(400000000,500000000),
            'date_of_birth' => $this->faker->date(),
            'address_of_birth' => $this->faker->randomElement(['البريج','الزهراء','الزوايدة','المغازي','المغراقة','النصيرات','بيت لاهيا','بيت حانون','جباليا','خانيونس','دير البلح','رفح','غزة','وادي غزة']),
            'orphan_age' => rand(1,16),
            'mother_name' => $this->faker->name(),
            'guardian_name' => $this->faker->name(),
            'guardian_RWO' => $this->faker->randomElement(['اخ/اخت','الاب','الام','جد /جدة','عم / عمة','خال / خالة']),
            'guardian_id' => rand(400000000,500000000),
            'status_health_orphan' => $this->faker->randomElement(['جريح','مصاب','سليم','مريض','جيد']),
            'health_status_notes' => 'العميل مهم جدًا، العميل سيتبعه العميل. في الحقيقة أقل؟',
            'deceased_name' => $this->faker->name(),
            'date_of_death' => $this->faker->date(),
            'cause_of_death' => 'العميل مهم جدًا، العميل سيتبعه العميل. في الحقيقة أقل؟',
            'child_orphaned_parents' => $this->faker->randomElement(['نعم','لا']),
            'DMD_mother' =>$this->faker->date(),
            'CMD_mother' => 'العميل مهم جدًا، العميل سيتبعه العميل. في الحقيقة أقل؟',
            'N_brothers' => rand(0,5),
            'N_sisters' => rand(0,5),
            'CH_house' => 'العميل مهم جدًا، العميل سيتبعه العميل. في الحقيقة أقل؟',
            'p_city' => $this->faker->randomElement(['البريج','الزهراء','الزوايدة','المغازي','المغراقة','النصيرات','بيت لاهيا','بيت حانون','جباليا','خانيونس','دير البلح','رفح','غزة','وادي غزة']),
            'c_city' => $this->faker->randomElement(['البريج','الزهراء','الزوايدة','المغازي','المغراقة','النصيرات','بيت لاهيا','بيت حانون','جباليا','خانيونس','دير البلح','رفح','غزة','وادي غزة']),
            'p_province' => $this->faker->randomElement(['الوسطى','الشمال','غزة','خانيونس','رفح']),
            'c_province' => $this->faker->randomElement(['الوسطى','الشمال','غزة','خانيونس','رفح']),
            'mobile_number1' => '0594318545',
            'WhatsApp_number' => '+972594318545',
            'orphan_displaced' => $this->faker->randomElement(['نعم','لا']),
            'p_address' =>'العميل مهم جدًا، العميل سيتبعه العميل. في الحقيقة أقل؟',
            'c_address' =>'العميل مهم جدًا، العميل سيتبعه العميل. في الحقيقة أقل؟',
            'livery' => $this->faker->randomElement(['نعم','لا']),
            'financial_aid' => $this->faker->randomElement(['نعم','لا']),
        ];
    }
}
