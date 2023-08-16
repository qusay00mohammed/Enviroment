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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');

            $table->unsignedBigInteger('organizationType_id');
            // $table->foreign('organizationType_id')->references('id')->on('organization_types')->onDelete('cascade');

            $table->string('address_main_branch');
            $table->date('year_founded');
            $table->string('website');
            $table->string('facebook');
            $table->string('instagram');
            $table->integer('annual_budget');
            $table->integer('number_centers');
            $table->integer('number_employees');
            $table->text('center_locations');
            $table->integer('ministry_finance_no');
            $table->integer('ministry_interior_no');
            $table->integer('number_current_projects');
            $table->text('donors');
            $table->text('numberemployees_you_deal_with');
            $table->text('nationalities_beneficiaries');
            $table->text('beneficiary_age_group');
            $table->text('upcoming_goals');
            $table->string('company_registration_certificate_ministry_interior');
            $table->string('company_organizational_structure');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
