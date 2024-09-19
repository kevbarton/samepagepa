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
        Schema::create('personalotherwallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->default(0);
            $table->bigInteger('wallet_id')->default(0);
            $table->bigInteger('personalother_type_id')->default(0);
            $table->string('personalother_type_name')->nullable();
            $table->string('label')->nullable();
            $table->string('company_name')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('renewal_date')->nullable();
            $table->string('contact')->nullable();
            $table->string('reminder_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalotherwallets');
    }
};
