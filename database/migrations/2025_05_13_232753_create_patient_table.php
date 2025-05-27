<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incrementing id)
            $table->string('first_name'); // Patient's first name
            $table->string('last_name'); // Patient's last name
            $table->string('email')->unique(); // Patient's email (unique)
            $table->date('birthdate'); // Patient's birthdate
            $table->string('phone_number'); // Patient's phone number
            $table->string('address'); // Patient's address
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
}
