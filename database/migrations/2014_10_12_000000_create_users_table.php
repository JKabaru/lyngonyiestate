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
            $table->id('employeeID');
            $table->string('iDNumber')->nullable();
            $table->string('accountNo')->nullable();
            // $table->string('firstName');
            $table->string('name');
            $table->date('dateOfBirth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->enum('status', ['active', 'onLeave', 'inactive'])->default('active');
            $table->unsignedBigInteger('contactInformationID')->nullable();
            $table->string('email')->nullable()->unique();
            $table->date('email_verified_at')->nullable();
            $table->string('photo')->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('addressID')->nullable();
            $table->unsignedBigInteger('departmentID')->nullable();
            $table->unsignedBigInteger('roleID')->nullable();
            $table->date('hireDate')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();

            // $table->foreign('ContactInformationID')->references('ContactInformationID')->on('ContactInformation')->onDelete('set null');
            // $table->foreign('AddressID')->references('AddressID')->on('Addresses')->onDelete('set null');
            // $table->foreign('DepartmentID')->references('DepartmentID')->on('Departments')->onDelete('set null');
            // $table->foreign('RoleID')->references('RoleID')->on('Roles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
