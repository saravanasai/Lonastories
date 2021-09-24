<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfoFromsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_info_froms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pr_form_of_user')->unsigned();
            $table->foreign('pr_form_of_user')->references('id')->on('table_customer');
            $table->string('Original_Name')->nullable();
            $table->string('Education_Qualification')->nullable();
            $table->string('Marital_Status')->nullable();
            $table->string('Spouse_name')->nullable();
            $table->date('Spouse_DOB')->nullable();
            $table->string('Father_Name')->nullable();
            $table->string('Mother_Name')->nullable();
            $table->string('Current_Address')->nullable();
            $table->string('Residence_Mobile_No')->nullable();
            $table->string('Current_Address_Landmark')->nullable();
            $table->string('Resi_type')->nullable();
            $table->string('No_of_years_cur_resi')->nullable();
            $table->string('No_of_years_cur_city')->nullable();
            $table->string('Pr_Address')->nullable();
            $table->string('Pr_Address_mobile_no')->nullable();
            $table->string('Pr_Address_Landmark')->nullable();
            $table->string('Of_Address')->nullable();
            $table->string('Of_Address_Landmark')->nullable();
            $table->string('Of_Address_contact_no')->nullable();
            $table->string('Per_mai')->nullable();
            $table->string('Of_mail')->nullable();
            $table->string('Salary_account_bank_name')->nullable();
            $table->string('Salary_account_bank_ac_no')->nullable();
            $table->date('DOJ_of_current_company')->nullable();
            $table->string('Total_work_expirence')->nullable();
            $table->string('Reference_1_name')->nullable();
            $table->string('Reference_1_contact_no')->nullable();
            $table->string('Reference_1_complete_address')->nullable();
            $table->string('Relation_1_type')->nullable();
            $table->string('Reference_2_name')->nullable();
            $table->string('Reference_2_contact_no')->nullable();
            $table->string('Reference_2_complete_address')->nullable();
            $table->string('Relation_2_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_info_froms');
    }
}
