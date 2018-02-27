<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = "skills";

    protected $fillable = ['nombre', 'experiencia'];
    
    public function empleado()
    {
        return $this->belongsTo('App\Empleado');
    }
}
