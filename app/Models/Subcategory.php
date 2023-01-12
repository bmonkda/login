<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relación uno a muchos
    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }

    // Relación uno a muchos inversa
    public function category(){
        return $this->belongsTo(Category::class)/* ->where('category_id', '$this->id') */;
    }

    // public function getCategoryIdAttribute()
    // {
    //     return $this->category_id;
    // } 
}
