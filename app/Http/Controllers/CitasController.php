<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Cita;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidad = Especialidad::All();
        $medicos = User::role('medico')->get();
        $usuarios = User::All();
        return view('citas.create', ['usuario'=>$usuarios,'medico'=>$medicos, 'especialidad'=>$especialidad]);
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

            'fecha'=>'max:255',
            'paciente'=>'required',
            'estatus'=>'max:255',
            'especialidad'=>'required',
            'medico'=>'required|max:50',

        ]);

        if($v->fails()){

            return redirect()->back()->withErrors($v)->withInput();
        }



        $cita=Cita::create([

            'fecha'=>$request->input('fecha'),
            'usuario'=>$request->input('paciente'),
            'estatus'=>$request->input('estatus'),
            'especialidad'=>$request->input('especialidad'),
            'medico'=>$request->input('medico'),


        ]);


   //     $user ->assignRole($request->input('role'));



        return redirect('/usuarios')->with('mensaje', 'Usuario creado con exito');



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
