<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblUsuario extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $fillable = [
        'area_id',
        'cargo',
        'nombre',
        'correo',
        'telefono',
        'contrasena',
        'rol',
        'fecha_registro',
    ];

    protected $hidden = ['contrasena'];
    protected $dates = ['deleted_at'];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}
