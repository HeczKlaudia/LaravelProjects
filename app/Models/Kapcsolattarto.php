<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapcsolattarto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'kapcsolattarto';
    protected $fillable = ['nev, email'];

    public function projekt()
    {
        return $this->belongsTo(Projekt::class);
    }
}
