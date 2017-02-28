<?php

namespace App\Http\Controllers;

use App\Historia;
use App\User;
use Illuminate\Http\Request;
use Validator;

class HistoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $historias = Historia::all();
        return view('historia.index',['historias'=>$historias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = User::role('paciente')->get();
        $doctores = User::role('medico')->get();
        return view('historia.create', ['medicos'=>$doctores], ['pacientes'=>$pacientes]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->All(), [

            'paciente'=>'required|max:50',
            'medico'=>'required|max:50',
            'informe'=>'required|max:350',


        ]);

        if($v->fails()){

            return redirect()->back()->withErrors($v)->withInput();
        }




        $user=Historia::create([

            'usuario'=>$request->input('paciente'),
            'medico'=>$request->input('medico'),
            'informe'=>$request->input('informe'),




        ]);


        return redirect('/historias')->with('mensaje', 'Historia creada con exito');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
