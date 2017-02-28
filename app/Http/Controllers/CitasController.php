<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Cita;
use Auth;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $citas = Cita::status()->paginate();
        return view ('citas.index', ['cita'=>$citas]);

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
        $usuarios = User::role('paciente')->get();
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
            'status'=>'max:255',
            'especialidad'=>'required',
            'medico'=>'required|max:50',

        ]);

        if($v->fails()){

            return redirect()->back()->withErrors($v)->withInput();
        }



        $cita=Cita::create([

            'fecha'=>$request->input('fecha'),
            'usuario'=>$request->input('paciente'),
            'status'=>$request->input('estatus'),
            'especialidad'=>$request->input('especialidad'),
            'medico'=>$request->input('medico'),


        ]);


   //     $user ->assignRole($request->input('role'));



        return redirect('/citas')->with('mensaje', 'Cita creado con exito');



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

    public function citaspormedico()
    {

        $usuarios = User::role('medico')->paginate();
        return view('citas.citaspormedico', ['usuarios'=>$usuarios]);

    }

    public function mostrarcitas($id)
    {

      $usuarios= Cita::where('medico', $id)->get();

        return view('citas.citasmedico',['usuarios'=>$usuarios]);

    }

    public function miscitas(){

        $id = Auth::user()->id;
        $citas= Cita::where('medico', $id)->where('status','=','pendiente')->get();
        //$citas = Cita::findorFail($id)->get();

        return view('doctores.home',['citas'=>$citas]);

    }
}
