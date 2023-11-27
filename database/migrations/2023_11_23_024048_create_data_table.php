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
        Schema::create('student_housing_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('school_year');
            $table->integer('total');
            $table->integer('in_temporary_housing_number');
            $table->float('in_temporary_housing_percent');
            $table->integer('in_shelter');
            $table->integer('in_shelter_dhs');
            $table->integer('in_shelter_non_dhs');
            $table->integer('doubled_up');
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_housing_data');
    }
};
