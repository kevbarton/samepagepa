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
        Schema::create('vehiclewallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->default(0);
            $table->bigInteger('vehicle_type_id')->default(0);
            $table->string('vehicle_type_name')->nullable();
            $table->string('vehicle_registration')->nullable();
            $table->string('vehicle_make')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_photo')->nullable();
            $table->string('mot_renewal_date')->nullable();
            $table->string('mot_reminder_date')->nullable();
            $table->string('service_garage')->nullable();
            $table->string('service_telephone_number')->nullable();
            $table->string('service_last_date')->nullable();
            $table->string('service_cost')->nullable();
            $table->string('service_next_Date')->nullable();
            $table->string('service_reminder_date')->nullable();
            $table->string('roadside_assistance_company_name')->nullable();
            $table->string('roadside_assistance_amount')->nullable();
            $table->string('roadside_assistance_telephone_number')->nullable();
            $table->string('roadside_assistance_policy_number')->nullable();
            $table->string('roadsise_assistance_renewal_date')->nullable();
            $table->string('roadside_assistance_reminder_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiclewallets');
    }
};
