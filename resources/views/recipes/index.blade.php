@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('mensaje'))
            <div class="row">
                <div class="col md-12">
                    <div class="alert alert-info alert-dismissible" role="info">
                        <button type="button" class="close" data-dismiss="info" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Aviso:</strong> {{session ('mensaje')}}.
                    </div>
                </div>

            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Recipe</div>

                    <div class="panel-body">
                        Listado de Recipes
                  {{--@if(Auth::user()->roles[0]->hasPermissionTo('CrearRole') or Auth::user()->can('CrearRole'))

                       @endif--}}

                            <a href="{{url('recipes/create')}}" class="btn btn-success">
                                <i class="fa fa-user"></i> Nuevo Recipe




{{--comentario en laravel  <a href="{{url('usuarios/create')}}" class="btn btn-success">
                            <i class="fa fa-user"></i> Nuevo Role
POST REDIRECCIONA PORQUE EJECUTA LA MISMA ACCION--}}
                        </a>

                        <table class="table table-bordered">
                            <tr>
                                <th>Fecha Emision</th>
                                <th>Paciente</th>
                                <th>Doctor</th>
                                <th>Medicina 1</th>
                                <th>Medicina 2</th>
                                <th>Medicina 3</th>


                                <th colspan="3" width="10%">Acciones</th>
                            </tr>
{{--Auth::user()->hasRole('Asministrador')

Auth::user('Administrador') as $user--}}
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->fecha_emision}}</td>
                                    <td>{{$usuario->user->nombre." ".$usuario->user->apellido}}</td>
                                    <td>{{$usuario->medico->nombre}}</td>
                                    <td>{{$usuario->medicina_1}}</td>
                                    <td>{{$usuario->medicina_2}}</td>
                                    <td>{{$usuario->medicina_3}}</td>



                                    <td><a href="{{url('/recipes/'.$usuario->id.'/edit')}}" class="btn btn-primary">
                                            <!--i.glaphicon.glaphicon-edit-->
                                            <i class="fa fa-edit"></i>
                                        </a>

                                    </td>
                                    <td>
                                        <button class="btn btn-danger"
                                                data-action="{{ url('/recipes/'.$usuario->id) }}"
                                                data-name="{{ $usuario->name."".$usuario->apellido."C.I.:".$usuario->cedula}}"
                                                data-toggle="modal" data-target="#confirm-delete">
                                            <i class ="fa fa-trash fa"></i>
                                        </button>
                                    </td>


                                </tr>


                            @endforeach
                        {{-- <th colspan="4" class="text-center">{{$usuarios->links()}}</th>--}}
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm-delete" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p>¿Seguro que desea eliminar este
                        registro?</p>
                    <p class="nombre"></p>
                </div>
                <div class="modal-footer">
                    <form class="form-inline form-delete"
                          role="form"
                          method="POST"
                          action="">
                        {!! method_field('DELETE') !!}
                        {!! csrf_field() !!}

                        <button type="button"
                                class="btn btn-default"
                                data-dismiss="modal">Cancelar
                        </button>

                   {{-- @if(Auth::user()->roles[0]->hasPermissionTo('EliminarUsuario') or Auth::user()->can('EliminarUsuario'))--}}
                        <button id="delete-btn"
                                class="btn btn-danger"
                                title="Eliminar">Eliminar
                        </button>
                    {{-- @endif--}}
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
