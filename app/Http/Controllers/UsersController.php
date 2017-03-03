<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\UserHasRole;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Validator;
use Auth;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = User::paginate(8);

        return view ('users.index',['usuarios'=>$usuarios]);




        
    }


    public function medicos()
    {

        if(!Auth::user()->hasRole('medico'))
            if(!Auth::user()->hasRole('administrador'))
                abort(503, 'Acceso Prohibido');

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

        if(!Auth::user()->hasRole('medico'))
         if(!Auth::user()->hasRole('secretaria'))
                abort(503, 'Acceso Prohibido');


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
                'password'=>bcrypt($request->input('password')),
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
        $roles = Role::all();
        $usuario = User::findOrfail($id);
        $espe = Especialidad::all();
        return view ('users.edit', ['usuario'=>$usuario,'roles'=>$roles,'espe'=>$espe ]);

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
        $v = Validator::make($request->All(), [


            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'fecha_nac'=>'required',
            'direccion'=>'required|max:250',
            'sexo'=>'required',
            'cedula' => 'required|max:8|unique:users,cedula,'.$id.'id',
            'telefono' => 'max:255',
            'celular' => 'max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id.'id',
            'password' => 'min:6|confirmed',
            'role' => 'required',
            'especialidad'=>'required'




        ]);

        if ($v->fails()) {

            return redirect()->back()->withErrors($v)->withInput();

        }


        $user = User::findOrFail($id);
        $user->update([

            'nombre'=>$request->input('nombre'),
            'fecha_nac'=>$request->input('fecha_nac'),
            'direccion'=>$request->input('direccion'),
            'sexo'=>$request->input('sexo'),
            'apellido'=>$request->input('apellido'),
            'cedula'=>$request->input('cedula'),
            'telefono'=>$request->input('telefono'),
            'celular'=>$request->input('celular'),
            'email'=>$request->input('email'),
            'especialidad_id'=>$request->input('especialidad'),


        ]);


        if ($request->input('password')) {
            $v = Validator::make($request->all(), [

                'password' => 'min:6|confirmed',
            ]);
            if ($v->fails()) {

                return redirect()->back()->withErrors()->withInput();
            }

            $user->update([

                'password' => bcrypt($request->input('password')),
            ]);
        }

        //  $user->removeRole(Role::all());
        // $user->assignRole($request->input('role'));
        $user->syncRoles($request->input('role'));


        return redirect('/usuarios')->with('mensaje' , 'Usuario actualizado con exito');

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
