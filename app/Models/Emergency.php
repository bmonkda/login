<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }
}
