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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('lisence_no');
            $table->string('email');
            $table->string('contact');
            $table->string('address');
            $table->string('gender');
            $table->date('dob');
            $table->string('specialization');
            $table->string('photo_path')->nullable(); // Store image file path
            $table->timestamps();
        
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
