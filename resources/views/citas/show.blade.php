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
                                    <input id="fecha" type="text" class="form-control" name="fecha" value="{{ $usuario->fecha}}" readonly>

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
                                    <input id="paciente" type="text" class="form-control" name="paciente" value="{{ $usuario->user->nombre." ".$usuario->user->apellido }}" readonly>
                                    @if($errors->has('paciente'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('paciente')}}</strong>
                                    @endif
                                </div>
                            </div>


                          {{-- <div class="form-group{{$errors->has('estatus') ? 'has-error' : ''}}">
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
--}}

                            <div class="form-group{{$errors->has('especialidad') ? 'has-error' : ''}}">
                                <label for="usuario" class="col-md-4 control-label">Especialidad</label>
                                <div class="col-md-6">
                                    <input id="paciente" type="text" class="form-control" name="paciente" value="{{ $usuario->especial->descripcion}}" readonly>
                                    @if($errors->has('especialidad'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('especialidad')}}</strong>
                                    @endif
                                </div>
                            </div>

                    <div class="form-group{{$errors->has('medico') ? 'has-error' : ''}}">
                        <label for="medico" class="col-md-4 control-label">medico</label>
                        <div class="col-md-6">
                            <input id="paciente" type="text" class="form-control" name="paciente" value="{{ $usuario->user->nombre." ".$usuario->user->apellido }}" readonly>
                            @if($errors->has('medico'))
                                <span class="help-block"></span>
                                <strong>{{$errors->first('medico')}}</strong>
                            @endif
                        </div>
                    </div>

                            <div class="form-group{{$errors->has('observaciones') ? 'has-error' : ''}}">
                                <label for="medico" class="col-md-4 control-label">Observaciones</label>
                                <div class="col-md-6">
                                                <textarea name="observaciones" id="observaciones" cols="10" rows="2"
                                                          class="form-control" readonly>{{$usuario->observaciones}}</textarea>
                                    @if($errors->has('medico'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('medico')}}</strong>

                                        $user->hasRole('medico')
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
