<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Lahiru',
                'last_name' => 'Ariyasinghe',
                'email' => 'lahiru@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'Tharindu',
                'last_name' => 'Ariyasinghe',
                'email' => 'tharindu@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'Lakmal',
                'last_name' => 'Chathurange',
                'email' => 'lakmal@gmail.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
