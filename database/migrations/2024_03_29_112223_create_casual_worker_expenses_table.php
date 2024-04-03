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
        Schema::create('casual_worker_expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('casual_worker_id');
            $table->unsignedBigInteger('department_id');
            $table->date('date');
            $table->decimal('rate', 10, 2); // Rate per day
            $table->integer('number_of_days'); // Number of days worked
            $table->decimal('amount', 10, 2); // Total amount
            $table->string('payment_status')->default('pending'); // Status of payment
            $table->date('payment_date')->nullable(); // Date of payment
            $table->timestamps();

            $table->foreign('casual_worker_id')->references('casual_workers_id')->on('casual_workers')->onDelete('cascade');
            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casual_worker_expenses');
    }
};
