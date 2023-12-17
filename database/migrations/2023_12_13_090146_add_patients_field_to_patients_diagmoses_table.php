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
        Schema::table('patients_diagnoses_medicaments', function (Blueprint $table) {
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('patients_id')->constrained()->onDelete('cascade');
            $table->foreignId('diagnoses_id')->constrained()->onDelete('cascade');
            $table->foreignId('medicaments_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients_diagmoses', function (Blueprint $table) {
            //
        });
    }
};
