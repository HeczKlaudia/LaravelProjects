<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapcsolattarto extends Model
{
    use HasFactory;

    protected $table = 'kapcsolattarto';
    protected $fillable = ['nev, email'];

    public function projekt()
    {
        return $this->belongsTo(Projekt::class);
    }
}
