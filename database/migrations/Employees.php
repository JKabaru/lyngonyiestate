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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('EmployeeID');
            $table->string('IDNumber')->nullable();
            $table->string('AccountNo')->nullable();
            $table->string('FirstName');
            $table->string('LastName');
            $table->date('DateOfBirth')->nullable();
            $table->enum('Gender', ['Male', 'Female', 'Other'])->nullable();
            $table->enum('Status', ['Active', 'OnLeave', 'Inactive'])->default('Active');
            $table->unsignedBigInteger('ContactInformationID')->nullable();
            $table->string('Email')->nullable()->unique();
            $table->string('Photo')->nullable();
           
            $table->unsignedBigInteger('AddressID')->nullable();
            $table->unsignedBigInteger('DepartmentID')->nullable();
            $table->unsignedBigInteger('RoleID')->nullable();
            $table->date('HireDate')->nullable();
            $table->decimal('Salary', 10, 2)->nullable();
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
