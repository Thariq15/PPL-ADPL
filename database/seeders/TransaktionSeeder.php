<?php

namespace Database\Seeders;

use App\Models\DetailTransaktion;
use App\Models\Transaktion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaktionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 10; $i++) {
            Transaktion::create([
                "buyer" => "Andi " . $i,
            ]);
        }
    }
}
