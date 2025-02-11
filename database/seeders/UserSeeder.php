<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Bipin Tiwari',
            'email'=>'Bipintiwari11@gmail.com',
            'password'=>Hash::make("Bipintiwari@118"),
            'is_admin'=>true
        ]);
    }
}
