<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = "empleados";

    protected $fillable = ['nombre', 'email', 'puesto', 'f_nacimiento', 'domicilio'];

    public function skills()
    {
        return $this->hasMany('App\Skill');
    }
}
