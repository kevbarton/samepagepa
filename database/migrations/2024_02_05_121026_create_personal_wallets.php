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
        Schema::create('personalwallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->default(0);
            $table->string('passport_number')->nullable();
            $table->string('passport_expire_date')->nullable();
            $table->string('passport_start_date')->nullable();
            $table->string('passport_issued_location')->nullable();
            $table->string('passport_reminder_date')->nullable();
            $table->string('driving_license_number')->nullable();
            $table->string('driving_license_start_date')->nullable();
            $table->string('driving_license_expire_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalwallets');
    }
};
