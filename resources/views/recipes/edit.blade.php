@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de Citas</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/recipes') }}">
                            {{ csrf_field('POST')}}
                            {{ csrf_field()}}

                            <div class="form-group{{ $errors->has('fecha_emision') ? ' has-error' : '' }}">
                                <label for="fecha_emision" class="col-md-4 control-label">fecha de emision</label>

                                <div class="col-md-6">
                                    <input id="fecha_emision" type="text" class="form-control" name="fecha_emision" value="{{ $recipe->fecha_emision or old('fecha_emision') }}" required autofocus>

                                    @if ($errors->has('fecha_emision'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha_emision') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @hasrole('farmaceuta')
                            <div class="form-group{{ $errors->has('fecha_entrega') ? ' has-error' : '' }}">
                                <label for="fecha_entrega" class="col-md-4 control-label">fecha entrega</label>

                                <div class="col-md-6">
                                    <input id="fecha_entrega" type="text" class="form-control" name="fecha_entrega" value="{{ old('fecha_entrega') }}" autofocus>

                                    @if ($errors->has('fecha_entrega'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha_entrega') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endhasrole


                            <div class="form-group{{$errors->has('paciente') ? 'has-error' : ''}}">
                                <label for="paciente" class="col-md-4 control-label">Paciente</label>
                                <div class="col-md-6">
                                    <select name="paciente" id="paciente" class="form-control" required>
                                        <option value="">Seleccione un paciente</option>
                                        @foreach($pacientes as $usuario)
                                            <option value="{{$usuario->id}}" @if($usuario->id==$recipe->user->id) selected @endif>{{$usuario->nombre." ".$usuario->apellido}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('paciente'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('paciente')}}</strong>
                                    @endif
                                </div>
                            </div>



                    @hasrole('farmaceuta');
                            <div class="form-group{{$errors->has('estatus') ? 'has-error' : ''}}">
                                <label for="estatus" class="col-md-4 control-label">Estatus</label>
                                <div class="col-md-6">
                                    <select name="estatus" id="estatus" class="form-control" >
                                            <option value="pendiente">Pendiente</option>
                                             <option value="entregado">Entregado</option>
                                    </select>
                                    @if($errors->has('estatus'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('estatus')}}</strong>
                                    @endif
                                </div>
                            </div>
                        @endhasrole

                            <div class="form-group{{$errors->has('observaciones') ? 'has-error' : ''}}">
                                <label for="observaciones" class=" col-md-4 control-label">Observaciones</label>
                                <div class="col-md-6">
            <textarea name="observaciones" id="observaciones" cols="10" rows="2"
                      class="form-control">{{$curso->contenido or  old('observaciones')}}</textarea>

                                    @if($errors->has('observaciones'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('observaciones')}}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('medicina_1') ? ' has-error' : '' }}">
                                <label for="medicina_1" class="col-md-4 control-label">Medicina 1</label>

                                <div class="col-md-6">
                                    <input id="medicina_1" type="text" class="form-control" name="medicina_1" value="{{ old('medicina_1') }}" required autofocus>

                                    @if ($errors->has('medicina_1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('medicina_1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('medicina_2') ? ' has-error' : '' }}">
                                <label for="medicina_2" class="col-md-4 control-label">Medicina 2</label>

                                <div class="col-md-6">
                                    <input id="medicina_2" type="text" class="form-control" name="medicina_2" value="{{ old('medicina_2') }}" required autofocus>

                                    @if ($errors->has('medicina_2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('medicina_2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('medicina_3') ? ' has-error' : '' }}">
                                <label for="medicina_3" class="col-md-4 control-label">Medicina 3</label>

                                <div class="col-md-6">
                                    <input id="medicina_3" type="text" class="form-control" name="medicina_3" value="{{ old('medicina_3') }}" required autofocus>

                                    @if ($errors->has('medicina_3'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('medicina_3') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <!--
                            Cita
                            especialidad
                            medico
                            fecha_emision
                            paciente
                            estatus
                            ($user->role('medico') as $medico)
                            -->

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
