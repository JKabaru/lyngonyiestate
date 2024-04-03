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
        Schema::create('users', function (Blueprint $table) {
            $table->id('employeeId');
            $table->string('name');
            $table->string('idNumber')->nullable();
            $table->string('accountNo')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->enum('status', ['active', 'onLeave', 'inactive'])->default('active');
            $table->string('contactInformation')->nullable();
            $table->string('email')->nullable()->unique();
            $table->enum('role', ['admin', 'user', 'other'])->nullable();
            $table->date('email_verified_at')->nullable();
            $table->string('photo')->nullable();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->date('hireDate')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
