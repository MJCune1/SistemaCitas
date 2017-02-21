<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $fillable = ['id_docior','descrpicion'];



    protected function User(){

        $this->HasOne('App\User');

    }
}
