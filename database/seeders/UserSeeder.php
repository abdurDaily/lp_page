<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = new User();
        $userData->name = 'abdur';
        $userData->status = 1;
        $userData->email = 'abdurdiary@gmail.com';
        $userData->password = Hash::make('password');
        $userData->save();
    }
}
