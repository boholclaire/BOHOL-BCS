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
    Schema::create('billing', function (Blueprint $table) {
    $table->id();

    $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
    // Optional if using appointments
     $table->foreignId('appointment_id')->nullable()->constrained('appointments')->onDelete('cascade');

    $table->decimal('amount', 10, 2);
    $table->string('description')->nullable();
    $table->date('billing_date');
    $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing');
    }
};
