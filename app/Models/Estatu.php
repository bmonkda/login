<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatu extends Model
{
    use HasFactory;

    protected $attributes = [
        'color' => null,

    ];

    protected $fillable = ['name'];

    // Relación uno a muchos

    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }
}
