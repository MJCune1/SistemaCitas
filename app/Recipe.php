<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipe';

    protected $fillable = [
        'fecha_emision',
        'fecha_entrega',
        'paciente',
        'doctor',
        'status',
        'observaciones',
        'medicina_1',
        'medicina_2',
        'medicina_3',
        'historia_id'];



    protected function user(){


        return $this->belongsTo('App\User', 'paciente');
    }

    public function medico(){


        return $this->belongsTo('App\User','doctor');
    }
}


