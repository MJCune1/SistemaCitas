<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{

    protected $fillable =['especialidad','usuario','medico','fecha', 'estatus','usuario','historia_id','observaciones'];



    public function especial(){


        return $this->belongsTo('App\Especialidad','especialidad');
    }


    public function user(){


        return $this->belongsTo('App\User','usuario');
    }


    public function doctor(){


        return $this->belongsTo('App\User','medico');
    }



    public function ScopeId($query, $id){

        
        return $query->where('medico','like','%$id%');


    }

    public function ScopeStatus($query){


        return $query->where('status','=','pendiente');


    }

    public function historia(){

        return $this->belongsTo('App\Historia','historia_id');

    }



}
