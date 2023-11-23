<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
        public function run()
        {
            User::create([
                'fname' => 'Admin ',
                'mname' => '',
                'lname' => 'Admin ',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => '0',
                'status'=>'1',
            ]);
    }
}
