<?php

namespace Database\Seeders;

use App\Facades\IdGenerator;
use App\Helpers\IdGenerator as HelpersIdGenerator;
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
            'user_id_222320'  => \App\Helpers\IdGenerator::userId(),
            'nama_222320'     => 'Admin Hotel',
            'email_222320'    => 'admin@hotel.com',
            'phone_222320'    => '081234567890',
            'alamat_222320'   => 'Jl. Hotel No. 123, Jakarta',
            'gender_222320'   => 'L',
            'password_222320' => Hash::make('admin123'),
            'role_222320'     => 'admin',
        ]);
    }
}
