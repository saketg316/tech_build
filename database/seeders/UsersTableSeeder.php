<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Saket',
            'number' => '8588000173',
            'email' => 'saketg316@gmail.com',
            'password' => Hash::make('password'),
            'deleted_at' => null,
        ]);
    }
}
