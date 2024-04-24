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
        Schema::create('perkuliahans', function (Blueprint $table) {
            // Primary Key
            $table->id();
            
            // Foreign Keys
            $table->string('nim', 10);
            $table->foreign('nim')->references('nim')->on('mahasiswas')->onDelete('cascade');
            
            $table->string('kode_mk', 10);
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliahs')->onDelete('cascade');
            
            // Columns
            $table->double('nilai');
            
            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkuliahans');
    }
};
