<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED
            $table->string('First_name'); // Make first_name nullable
            $table->string('Last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_status_id')->constrained()->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();

        });

        // Insert initial user using DB facade
        DB::table('users')->insert([
            'First_name' => 'Admin',
            'Last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'user_status_id' => 1,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
