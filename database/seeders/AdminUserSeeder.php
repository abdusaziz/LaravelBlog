<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $adminUser = [
            [
                'name' => "Admin",
                'email' => "admin@demo.com",
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'usertype' => "admin",
                'remember_token' => Str::random(10)
            ],
            [
                'name' => "Writter",
                'email' => "writter@demo.com",
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'usertype' => "writter",
                'remember_token' => Str::random(10)
            ],
            [
                'name' => "User",
                'email' => "user@demo.com",
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'usertype' => "user",
                'remember_token' => Str::random(10)
            ]
        ];

        foreach($adminUser as $adminU){
            User::insert($adminU);
        }

    }
}
