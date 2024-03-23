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
        Schema::create('contact_information', function (Blueprint $table) {
            $table->bigIncrements('contactInformationID');
            $table->unsignedBigInteger('employeeID');
            $table->string('phone', 20);
            $table->string('email', 255);
            $table->unsignedBigInteger('addressID');
            $table->unsignedBigInteger('emergencyContactID');
            
            // $table->foreign('EmployeeID')->references('EmployeeID')->on('employees');
            // $table->foreign('AddressID')->references('AddressID')->on('addresses');
            // $table->foreign('EmergencyContactID')->references('EmergencyContactID')->on('emergency_contacts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_information');
    }
};
