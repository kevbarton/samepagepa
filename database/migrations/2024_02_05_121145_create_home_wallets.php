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
        Schema::create('homewallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->defaut(0);
            $table->string('home_address_label')->nullable();
            $table->string('home_address_1')->nullable();
            $table->string('home_address_2')->nullable();
            $table->string('home_address_town')->nullable();
            $table->string('home_address_city')->nullable();
            $table->string('home_address_postc0de')->nullable();
            $table->string('home_mortgage_company_name')->nullable();
            $table->string('home_mortgage_amount')->nullable();
            $table->string('home_mortgage_policy_number')->nullable();
            $table->string('home_mortgage_telephone_number')->nullable();
            $table->string('home_mortgage_renewal_date')->nullable();
            $table->string('home_mortgage_reminder_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homewallets');
    }
};
