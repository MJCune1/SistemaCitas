<?php

namespace App\Http\Controllers;

use App\Historia;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;

class HistoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->hasRole('medico'))
            if(!Auth::user()->hasRole('administrador'))
                abort(503, 'Acceso Prohibido');
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
        if(!Auth::user()->hasRole('medico'))
            if(!Auth::user()->hasRole('administrador'))
                abort(503, 'Acceso Prohibido');

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
        if(!Auth::user()->hasRole('medico'))
            if(!Auth::user()->hasRole('administrador'))
                abort(503, 'Acceso Prohibido');
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
        if(!Auth::user()->hasRole('medico'))
            if(!Auth::user()->hasRole('administrador'))
                abort(503, 'Acceso Prohibido');

        $historia = Historia::findOrfail($id);
        return view('historia.edit', ['historia'=>$historia]);
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
