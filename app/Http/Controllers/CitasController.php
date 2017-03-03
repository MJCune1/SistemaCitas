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
        if(!Auth::user()->hasRole('secretaria'))
            if(!Auth::user()->hasRole('administrador'))
                abort(503, 'Acceso Prohibido');

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
        if(!Auth::user()->hasRole('secretaria'))
            if(!Auth::user()->hasRole('administrador'))
                abort(503, 'Acceso Prohibido');

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

        if(!Auth::user()->hasRole('secretaria'))
            if(!Auth::user()->hasRole('administrador'))
                abort(503, 'Acceso Prohibido');


        $v = Validator::make($request->All(), [

            'fecha'=>'max:255',
            'paciente'=>'required',
            'status'=>'max:255',
            'observaciones'=>'required:255',
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
            'observaciones'=>$request->input('observaciones'),
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
        $especial = Especialidad::all();
        $cita = Cita::findOrfail($id);
        return view ('citas.show',['usuario'=>$cita,'especialidades'=>$especial]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacientes = User::all();
        $cita = Cita::findOrFail($id);
        $especialidad = Especialidad::all();
        $medicos = User::role('medico')->get();
        return view('citas.edit', ['cita'=>$cita, 'usuario'=>$pacientes, 'especialidad'=>$especialidad, 'medico'=>$medicos]);
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
        if(!Auth::user()->hasRole('secretaria'))
            if(!Auth::user()->hasRole('administrador'))
                abort(503, 'Acceso Prohibido');


        $v = Validator::make($request->All(), [

            'fecha'=>'max:255',
            'paciente'=>'required',
            'status'=>'max:255',
            'observaciones'=>'required|max:255',
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
            'observaciones'=>$request->input('observaciones'),
            'especialidad'=>$request->input('especialidad'),
            'medico'=>$request->input('medico'),


        ]);


        //     $user ->assignRole($request->input('role'));



        return redirect('/citas')->with('mensaje', 'Cita creado con exito');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cita::destroy($id);


    }

    public function citaspormedico()
    {

        $usuarios = User::role('medico')->paginate();
        return view('citas.citaspormedico', ['usuarios'=>$usuarios]);

    }

    public function mostrarcitas($id)
    {
        $medico = User::findorFail($id);
      $usuarios= Cita::where('medico', $id)->get();

        return view('citas.citasmedico',['usuarios'=>$usuarios, 'medico'=>$medico]);

    }

    public function miscitas(){

        $id = Auth::user()->id;
        $citas= Cita::where('medico', $id)->where('status','=','pendiente')->get();
        //$citas = Cita::findorFail($id)->get();

        return view('doctores.home',['citas'=>$citas]);

    }
}
