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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('dbn', 6)->unique();
            $table->text('name');
            $table->text('type');
            $table->integer('school_district');
            $table->integer('community_district')->nullable();
            $table->integer('council_district')->nullable();
            $table->integer('census_tract')->nullable();
            $table->text('address')->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
