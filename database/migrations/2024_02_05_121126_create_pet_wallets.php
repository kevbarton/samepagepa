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
        Schema::create('petwallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->default(0);
            $table->string('name')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('photo')->nullable();
            $table->text('checkup')->nullable();
            $table->string('chip_number')->nullable();
            $table->string('pedigree_certificate')->nullable();
            $table->string('vet_name')->nullable();
            $table->string('vet_telephone_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petwallets');
    }
};
