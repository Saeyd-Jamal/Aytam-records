<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'السيد جمال الاخرسي',
            'username' => 'saeyd_jamal',
            'email' => 'alsaeydjalakhras@gmail.com',
            'password' => Hash::make('20051118Jamal'),
            'phone_number' => '0594318545',
            'type_user' => 'متحكم رئيسي',
        ]);
    }
}
