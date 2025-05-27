<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Claire', // Make sure these are not left blank
            'last_name' => 'Bohol',  // Ensure these fields are filled
            'email' => 'clairebohol@gmail.com',
            'password' => bcrypt('your_password'),
            'role_id' => 1,
            'user_status_id' => 1,
        ]);
    }
}

