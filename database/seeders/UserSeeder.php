<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Crypt::encrypt('password'); 

        DB::table('users')->insert([
            'name' => 'admin',   
            'phone_number' => '254712345678',       
            'bidder_unique_id' => Str::random(8),           
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'first_pass_change' => true,
            'eligible' => true,
            'password' => $password,
        ]);

         DB::table('users')->insert([
            'name' => 'Calvin Magezi',   
            'phone_number' => '254741925996',       
            'bidder_unique_id' => Str::random(8),           
            'role' => 'admin',
            'email' => 'calvinmagezi@ymail.com',
            'first_pass_change' => true,
            'eligible' => true,
            'password' => $password,
        ]);
    }
}
