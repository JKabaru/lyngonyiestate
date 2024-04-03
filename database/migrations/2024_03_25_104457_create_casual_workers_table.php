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
        Schema::create('casual_workers', function (Blueprint $table) {
            $table->id('casual_workers_id');
            $table->string('name');
            $table->date('dateOfBirth')->nullable();
            $table->date('hireDate')->nullable();
            $table->string('email')->unique();
            $table->string('contactInformation')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->enum('status', ['active', 'onLeave', 'inactive'])->default('active');
            $table->string('address')->nullable();
            $table->string('description')->nullable();


            $table->rememberToken();
            // Add additional fields as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casual_workers');
    }
};
