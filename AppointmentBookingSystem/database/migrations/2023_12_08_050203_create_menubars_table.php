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
        Schema::create('menubars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('order');
            $table->integer('type');
            // $table->integer('parent_id')->nullable();

            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade')->nullable();
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade')->nullable();
            $table->string('external_link')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menubars');
    }
};
