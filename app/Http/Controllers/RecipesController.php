<?php

namespace App\Http\Controllers;

use App\Historia;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Recipe;
use Auth;


class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = Recipe::all();
        return view ('recipes.index', ['usuarios'=>$usuarios]);
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
        $historias = Historia::all();
        $medicos = User::role('medico')->get();
        $pacientes = User::role('paciente')->get();
        return view ('recipes.create',['pacientes'=>$pacientes],['medicos'=>$medicos,'historias'=>$historias]);

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

            'fecha_emision'=>'required|max:50',
            'paciente'=>'required',
            'medico'=>'required|max:255',
            'historia'=>'required',
            'observaciones'=>'required|max:255',
            'medicina_1'=>'max:255',
            'medicina_2'=>'max:255',
            'medicina_2'=>'max:255',

        ]);

        if($v->fails()){

            return redirect()->back()->withErrors($v)->withInput();
        }




        $user=Recipe::create([

            'fecha_emision'=>$request->input('fecha_emision'),
            'estatus'=>$request->input('estatus'),
            'paciente'=>$request->input('paciente'),
            'doctor'=>$request->input('medico'),
            'historia_id'=>$request->input('historia'),
            'observaciones'=>$request->input('observaciones'),
            'medicina_1'=>$request->input('medicina_1'),
            'medicina_2'=>$request->input('medicina_2'),
            'medicina_3'=>$request->input('medicina_3'),



        ]);



        return redirect('/recipes')->with('mensaje', 'recipe creado con exito');



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
        $recipe = Recipe::findOrfail($id);
        $historias = Historia::all();
        $medicos = User::role('medico')->get();
        $pacientes = User::role('paciente')->get();
        return view ('recipes.edit',['pacientes'=>$pacientes,'recipe'=>$recipe]);
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


            'fecha_emision' => 'required|max:50',
            'medico' => 'max:255',
            'observaciones' => 'max:255',
            'medicina_1' => 'min:1',
            'medicina_2' => 'min:1',
            'medicina_3' => 'min:1',




        ]);

        if ($v->fails()) {

            return redirect()->back()->withErrors($v)->withInput();

        }



        $recipe = Recipe::findOrFail($id);
        $recipe->update([

            'fecha_emision'=>$request->input('fecha_emision'),
            'fecha_entrega'=>$request->input('fecha_entrega'),
            'medico'=>$request->input('medico'),
            'status'=>$request->input('estatus'),
            'observaciones'=>$request->input('observaciones'),
            'medicina_1'=>$request->input('medicina_1'),
            'medicina_2'=>$request->input('medicina_2'),
            'medicina_3'=>$request->input('medicina_3'),



        ]);



        return redirect('/recipes')->with('mensaje' , 'Recipe actualizado con exito');


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
