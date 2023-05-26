<?php

namespace Database\Seeders;

use App\Models\DetailTransaktion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailTransaktionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($j = 1; $j <= 10; $j++) {
            for ($i = 1; $i <= 10; $i++) {
                DetailTransaktion::create([
                    "transaktion_id" => $i,
                    "name" => "Kopi",
                    "count" => 2,
                    "price" => 10000,
                    "amount" => 20000,
                ]);
            }
        }
    }
}
