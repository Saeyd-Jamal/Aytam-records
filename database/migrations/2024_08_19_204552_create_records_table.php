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
        Schema::create('orphan_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->unsignedInteger('orphan_id')->unique()->length(9)->nullable();
            $table->date('date_of_birth');
            $table->string('address_of_birth')->nullable();
            $table->integer('orphan_age');
            $table->string('Id_father',9); // Id of father
            $table->date('DFB_father'); // Date of father's Birth
            $table->string('mother_name');
            $table->string('Id_mother',9); // Id of mother
            $table->date('DMB_mother'); // Date of mother's Birth
            $table->string('guardian_name');
            $table->string('guardian_RWO'); //Relationship with orphan
            $table->string('guardian_id',9);
            $table->date('DGM_guardian'); // Date of guardian's Birth
            $table->string('status_health_orphan');
            $table->text('health_status_notes');
            $table->string('deceased_name'); // the deceased's name
            $table->date('date_of_death');
            $table->string('cause_of_death');
            $table->string('child_orphaned_parents');
            $table->date('DMD_mother')->nullable(); // Date of mother's death
            $table->string('CMD_mother')->nullable(); // Cause of mother's death
            $table->integer('N_brothers'); // Number of brother's orphan
            $table->integer('N_sisters'); // Number of sister's orphan
            $table->string('CH_house'); // condition of the house
            $table->string('p_province'); // المحافظة السابقة
            $table->string('p_city'); // المدينة السابقة
            $table->string('p_address'); // Previous orphan's address
            $table->string('c_province')->nullable(); // المحافظة الحالية
            $table->string('c_city')->nullable(); // المدينة الحالية
            $table->string('c_address')->nullable();// current orphan's address
            $table->string('orphan_displaced'); //هل اليتيم نازح؟
            $table->string('mobile_number1',10);
            $table->string('mobile_number2',10)->nullable();
            $table->string('WhatsApp_number',13)->nullable();
            $table->string('livery')->nullable(); //كسوة
            $table->string('financial_aid')->nullable(); // كفالة
            $table->text('notes_orphan')->nullable();
            $table->foreignId('data_portal')->nullable()->constrained('users')->nullOnDelete();
            $table->string('data_portal_name')->nullable();
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
