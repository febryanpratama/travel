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
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'is_active' => 1
        ]);

        $admin->assignRole('admin');

        // $rental = User::create([
        //     'name' => 'Rental',
        //     'email' => 'rental@rental.com',
        //     'password' => Hash::make('123456'),
        //     'is_active' => 1
        // ]);

        // $rental->assignRole('rental');

        // // $user = User::create([
        // //     'name' => 'User',
        // //     'email' => 'user@user.com',
        // //     'password' => Hash::make('123456'),
        // //     'is_active' => 1
        // // ]);

        // $user->assignRole('user');
    }
}
