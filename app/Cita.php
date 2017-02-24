<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{

    protected $fillable =['especialidad','usuario','medico','fecha', 'estatus'];

    public function medico(){

        return $this->hasOne('App\User', 'especialidad_id');

    }

    public function especialidad(){


        return $this->belongsTo('App\Especialidad');
    }

    public function paciente(){

        return $this->hasOne('App\User', 'especialidad_id');

    }



}
