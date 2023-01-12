<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    // Relaciones

    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
