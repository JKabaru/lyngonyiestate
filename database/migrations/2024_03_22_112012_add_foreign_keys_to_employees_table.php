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
        Schema::table('users', function (Blueprint $table) {
            // Add foreign key constraint for ContactInformationID
            // $table->foreign('contactInformationID')->references('contactInformationID')->on('contact_information')->onDelete('set null');
            
            // Add foreign key constraint for AddressID
            $table->foreign('addressID')->references('addressID')->on('addresses')->onDelete('set null');

            // Add foreign key constraint for DepartmentID
            $table->foreign('departmentID')->references('departmentID')->on('departments')->onDelete('set null');

            // Add foreign key constraint for RoleID
            $table->foreign('roleID')->references('roleID')->on('roles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['contactInformationID']);
            $table->dropForeign(['addressID']);
            $table->dropForeign(['departmentID']);
            $table->dropForeign(['roleID']);
        });
    }
};
