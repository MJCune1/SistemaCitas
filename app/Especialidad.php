<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Especialidad extends Model
{
    use HasRoles;

    protected $fillable = ['id', 'descripcion'];
    protected $table = 'especialidades';


    public function user()
    {

        return $this->hasOne('App\User', 'especialidad_id');

    }

    public function citas()
    {


        return $this->hasOne('App\Cita', 'especialidad');


    }


}
