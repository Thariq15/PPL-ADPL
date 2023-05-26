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
            "name" => "Karyawan",
            "position" => "Karyawan",
            "email" => "karyawan@mail.com",
            "password" => Hash::make("karyawan@mail.com"),
        ]);

        User::create([
            "name" => "Caffe",
            "position" => "Admin Caffe",
            "email" => "caffe@mail.com",
            "password" => Hash::make("caffe@mail.com"),
        ]);

        User::create([
            "name" => "Kopi",
            "position" => "Admin Kopi",
            "email" => "kopi@mail.com",
            "password" => Hash::make("kopi@mail.com"),
        ]);
    }
}
