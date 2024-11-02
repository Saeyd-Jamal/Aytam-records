<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();

            // بيانات اليتيم
            $table->string('first_name'); // اسم اليتيم
            $table->string('father_name');
            $table->string('grandfather_name');
            $table->string('family_name');
            // --------------------
            $table->string('gender');
            $table->unsignedInteger('orphan_id')->unique()->length(11)->nullable();
            $table->date('date_of_birth');
            $table->integer('age');
            $table->string('address_of_birth')->nullable();
            $table->string('status_health_orphan')->nullable();
            $table->text('health_status_notes')->nullable();
            $table->string('child_orphaned_parents')->nullable();
            $table->integer('N_brothers')->nullable(); // Number of brother's orphan
            $table->integer('N_sisters')->nullable(); // Number of sister's orphan
            $table->string('livery')->nullable(); //كسوة
            $table->string('financial_aid')->nullable(); // كفالة
            $table->text('notes_orphan')->nullable();


            // بيانات الأب
            $table->string('Id_father',11); // Id of father
            $table->date('DFB_father')->nullable(); // Date of father's Birth

            // بيانات المتوفي
            $table->string('first_deceased_name');
            $table->string('father_deceased_name');
            $table->string('grandfather_deceased_name')->nullable();
            $table->string('family_deceased_name');

            // ------------
            $table->date('date_of_death');
            $table->string('cause_of_death');



            // بيانات الام
            $table->string('first_mother_name'); // اسم الأم
            $table->string('father_mother_name');
            $table->string('grandfather_mother_name')->nullable();
            $table->string('family_mother_name');
            // ---------
            $table->string('Id_mother',11); // هوية الأم
            $table->date('DMB_mother'); // تاريخ ميلاد الأم
            $table->date('DMD_mother')->nullable(); // تاريخ وفاء الأم
            $table->string('CMD_mother')->nullable(); // سبب وفاء الأم
            $table->string('mother_social_situation')->nullable(); // الحالة الإجتماعية


            // ولي الأمر
            $table->string('first_guardian_name');
            $table->string('father_guardian_name');
            $table->string('grandfather_guardian_name')->nullable();
            $table->string('family_guardian_name');
            // -----------
            $table->string('guardian_RWO'); // صلة القرابة
            $table->string('guardian_id',9); // هوية ولي الأمر
            $table->date('DGM_guardian')->nullable(); // Date of guardian's Birth
            $table->string('guardian_scientific_qualification')->nullable(); // المؤهل العلمي لولي الامر
            $table->string('guardian_work')->nullable(); // عمل ولي الأمر
            // -----------
            $table->string('mobile_number1',50)->nullable();
            $table->string('mobile_number2',50)->nullable();
            $table->string('WhatsApp_number',50)->nullable();


            // بيانات السكن
            $table->string('CH_house'); // condition of the house
            $table->string('p_province'); // المحافظة السابقة
            $table->string('p_city'); // المدينة السابقة
            $table->string('p_address'); // Previous orphan's address
            $table->string('c_province')->nullable(); // المحافظة الحالية
            $table->string('c_city')->nullable(); // المدينة الحالية
            $table->string('c_address')->nullable();// current orphan's address
            $table->string('orphan_displaced'); //هل اليتيم نازح؟

            // بيانات الموظفين
            $table->foreignId('data_portal')->nullable()->constrained('users')->nullOnDelete();
            $table->string('data_portal_name')->nullable();
            $table->string('section')->nullable(); // الفرع المسجل
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
