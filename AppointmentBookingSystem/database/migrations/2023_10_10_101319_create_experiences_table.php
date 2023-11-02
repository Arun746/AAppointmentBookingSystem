<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctors_id')->constrained('doctors')->onDelete('cascade'); 
            $table->string('organization');
            $table->string('position');
            $table->text('job_description'); 
            $table->date('start_date');
            $table->date('end_date')->nullable(); 
            $table->timestamps();

            
            // $table->foreign('doctors_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience');
    }
};
