<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Menu::create([
                "name" => "Kopi " . $i,
                "description" => "lorem ipsum dolor sit amet",
                "image" => "default.png",
                "status" => "Ready",
                "price" => 20000,
            ]);
        }
    }
}
