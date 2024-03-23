<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToContactInformationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contact_information', function (Blueprint $table) {
            // Add foreign key constraint for EmployeeID
            $table->foreign('employeeID')->references('employeeID')->on('users');

            // Add foreign key constraint for AddressID
            $table->foreign('addressID')->references('addressID')->on('addresses');

            // Add foreign key constraint for EmergencyContactID
            $table->foreign('emergencyContactID')->references('emergencyContactID')->on('emergency_contacts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_information', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['employeeID']);
            $table->dropForeign(['addressID']);
            $table->dropForeign(['emergencyContactID']);
        });
    }
}
