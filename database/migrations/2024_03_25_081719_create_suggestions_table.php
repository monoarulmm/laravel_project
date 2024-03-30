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
        Schema::create('suggestions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('semester');
            $table->string('dept');
            $table->string('subject');
            $table->unsignedBigInteger('user_id'); // Assuming you want to associate suggestions with users
            $table->string('files')->nullable();

            // Define foreign key constraint for user_id column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suggestions', function (Blueprint $table) {
            $table->dropColumn('files');
        });
    }
};
