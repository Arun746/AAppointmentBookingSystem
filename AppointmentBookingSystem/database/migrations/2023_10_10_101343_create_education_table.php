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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctors_id')->constrained('doctors')->onDelete('cascade'); 
            $table->string('level');
            $table->string('board');
            $table->string('institution');
            $table->year('completion_year'); 
            $table->decimal('gpa'); 
            $table->timestamps();

            
            // $table->foreign('doctors_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
