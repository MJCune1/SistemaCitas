<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    protected $table = 'historia';

    protected $fillable = ['usuario','medico','informe'];


    public function user(){

        return $this->belongsTo('App\User','usuario');
    }

    public function doctores(){

        return $this->belongsTo('App\User','medico');
    }
}
