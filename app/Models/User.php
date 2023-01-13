<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $connection = 'rrhh';
    protected $table = 'acceso.usuarios';
    protected $primaryKey = 'idusuario';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'name', 'uid', 'email', 'password', 'id_statu',

        'uid', 'nombre', 'correo', 'clave', 'idstatus', 'username'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        // 'remember_token',
        'clave',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
        'fecstatus' => 'datetime',
    ];

    public function adminlte_image(){
        return $this->profile_photo_url;
    }

    public function adminlte_desc()
    {
        // modificar código cuando se haga tabla de roles
        // return rol del usuario;
        // return 'Administrador';
        if ($this->hasRole('Admin')) {
            return 'Administrador';
        }
        if ($this->hasRole('Usuario')) {
            return 'Usuario';
        }
        if ($this->hasRole('Soporte')) {
            return 'Soporte';
        }
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
    
}
