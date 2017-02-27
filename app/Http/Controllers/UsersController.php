<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\UserHasRole;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Validator;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = User::role('medico')->paginate();

        return view ('doctores.index',['usuarios'=>$usuarios]);




        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $espe = Especialidad::All();
        $roles = Role::All();
        return view('users.create', ['roles'=>$roles], ['espe'=>$espe]);
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

            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'cedula'=>'required|max:8|unique:users',
            'direccion'=>'required|max:255',
            'sexo'=>'required',
            'fecha_nac'=>'required',
            'telefono'=>'max:255',
            'celular'=>'max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:6|confirmed',
            'role'=>'required',
        ]);

        if($v->fails()){

            return redirect()->back()->withErrors($v)->withInput();
        }




            $user=User::create([

                'nombre'=>$request->input('nombre'),
                'apellido'=>$request->input('apellido'),
                'cedula'=>$request->input('cedula'),
                'direccion'=>$request->input('direccion'),
                'sexo'=>$request->input('sexo'),
                'fecha_nac'=>$request->input('fecha_nac'),
                'telefono'=>$request->input('telefono'),
                'celular'=>$request->input('celular'),
                'email'=>$request->input('email'),
                'password'=>$request->input('password'),
                'especialidad_id'=>$request->input('especialidad'),



            ]);


            $user ->assignRole($request->input('role'));



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
