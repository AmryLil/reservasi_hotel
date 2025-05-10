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
        // Create admin user
        User::create([
            'nama_222320'     => 'Admin Hotel',
            'email_222320'    => 'admin@hotel.com',
            'phone_222320'    => '081234567890',
            'alamat_222320'   => 'Jl. Hotel No. 123, Jakarta',
            'gender_222320'   => 'L',
            'password_222320' => Hash::make('admin123'),
            'role_222320'     => 'admin',
        ]);

        // Create regular users
        User::create([
            'nama_222320'     => 'John Doe',
            'email_222320'    => 'john@example.com',
            'phone_222320'    => '081234567891',
            'alamat_222320'   => 'Jl. Merdeka No. 10, Surabaya',
            'gender_222320'   => 'L',
            'password_222320' => Hash::make('password123'),
            'role_222320'     => 'user',
        ]);

        User::create([
            'nama_222320'     => 'Jane Smith',
            'email_222320'    => 'jane@example.com',
            'phone_222320'    => '081234567892',
            'alamat_222320'   => 'Jl. Pahlawan No. 25, Bandung',
            'gender_222320'   => 'P',
            'password_222320' => Hash::make('password123'),
            'role_222320'     => 'user',
        ]);

        // Create more fake users
        \App\Models\User::factory(7)->create();
    }
}
