<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Projekt extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id';
    protected $table = 'projekt';
    protected $fillable = ['nev, leiras, statusz, kapcsolat_id'];

    public function kapcsolattarto()
    {
        return $this->hasMany(Kapcsolattarto::class, 'id', 'kapcsolat_id');
    }
}
