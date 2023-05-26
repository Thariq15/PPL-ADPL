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
        for ($i = 1; $i <= 10; $i++) {
            DetailTransaktion::create([
                "transaktion_id" => $i,
                "count" => 2,
                "price" => 10000,
                "amount" => 20000,
            ]);
        }
    }
}
