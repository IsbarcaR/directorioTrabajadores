<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $fillable=['nombre','apellidos','telefono','email','foto','departamento','fecha_nacimiento','sustituto','mayor55','cargos'];
}
