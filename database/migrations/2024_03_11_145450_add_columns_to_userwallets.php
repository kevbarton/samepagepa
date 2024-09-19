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
        Schema::table('userwallets', function (Blueprint $table) {
            $table->string('colour')->nullable();
            $table->string('icon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userwallets', function (Blueprint $table) {
            $table->dropColumn('colour');
            $table->dropColumn('icon');
        });
    }
};
