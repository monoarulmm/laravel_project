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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
         

            $table->string('owner')->nullable();
            
            $table->string('teacher1')->nullable();
            $table->string('teacher2')->nullable();
            $table->string('teacher3')->nullable();
            $table->string('teacher4')->nullable();

            $table->string('image')->nullable();


            $table->string('lab1')->nullable();
            $table->string('lab2')->nullable();
            $table->string('lab3')->nullable();
            $table->string('lab4')->nullable();
            $table->string('lab5')->nullable();

            $table->longText('shortdesc1')->nullable();
            $table->longText('shortdesc2')->nullable();
            $table->longText('shortdesc3')->nullable();
            $table->longText('shortdesc4')->nullable();
            $table->longText('shortdesc5')->nullable();
            
            $table->longText('description')->nullable();
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
