<?php

namespace App\Http\Controllers;

use App\Cita;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $id = Auth::user()->id;
        $citas= Cita::where('usuario', $id)->get();
        //$citas = Cita::findorFail($id)->get();
        
        return view('home',['citas'=>$citas]);
    }
}
