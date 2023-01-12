<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenciaUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'incidencia_id',
        'asignado_id',
    ];


    /* public function modos()
    {
        return $this->belongsToMany(Modo::class);
    } */
}