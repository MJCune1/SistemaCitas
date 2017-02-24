@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de Citas</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/citas') }}">
                            {{ csrf_field('POST')}}
                            {{ csrf_field()}}

                            <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                                <label for="fecha" class="col-md-4 control-label">fecha</label>

                                <div class="col-md-6">
                                    <input id="fecha" type="text" class="form-control" name="fecha" value="{{ old('fecha') }}" required autofocus>

                                    @if ($errors->has('fecha'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('paciente') ? 'has-error' : ''}}">
                                <label for="paciente" class="col-md-4 control-label">paciente</label>
                                <div class="col-md-6">
                                    <select name="paciente" id="paciente" class="form-control" >
                                        @foreach($usuario as $usuario)
                                            <option value="{{$usuario->id}}">{{$usuario->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('paciente'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('paciente')}}</strong>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{$errors->has('estatus') ? 'has-error' : ''}}">
                                <label for="estatus" class="col-md-4 control-label">estatus</label>
                                <div class="col-md-6">
                                    <select name="estatus" id="estatus" class="form-control" >
                                            <option value="activo">Activa</option>
                                             <option value="activo">Vista</option>
                                    </select>
                                    @if($errors->has('estatus'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('estatus')}}</strong>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{$errors->has('doctor') ? 'has-error' : ''}}">
                                <label for="usuario" class="col-md-4 control-label">Especialidad</label>
                                <div class="col-md-6">
                                    <select name="especialidad" id="especialidad" class="form-control" >
                                        @foreach($medico as $medico)
                                            <option value="{{$medico->id}}">{{$especialidad->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('medico'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('medico')}}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('medicina_1') ? ' has-error' : '' }}">
                                <label for="medicina_1" class="col-md-4 control-label">Medicina 1</label>

                                <div class="col-md-6">
                                    <input id="medicina_1" type="text" class="form-control" name="medicina_1" value="{{ old('nombre') }}" required autofocus>

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
                                    <input id="medicina_2" type="text" class="form-control" name="medicina_2" value="{{ old('nombre') }}" required autofocus>

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
                                    <input id="medicina_3" type="text" class="form-control" name="medicina_3" value="{{ old('nombre') }}" required autofocus>

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
                            fecha
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
