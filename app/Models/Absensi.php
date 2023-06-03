<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shift(){
        return $this->belongsTo(Shift::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
