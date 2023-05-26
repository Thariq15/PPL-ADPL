<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaktion extends Model
{
    use HasFactory;

    public function detail_transaktions()
    {
        return $this->hasMany(DetailTransaktion::class);
    }
}
