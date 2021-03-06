@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de Citas</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/citas/'.$cita->id) }}">
                            {{ method_field('PUT')}}
                            {{ csrf_field()}}

                            <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                                <label for="fecha" class="col-md-4 control-label">fecha</label>

                                <div class="col-md-6">
                                    <input id="fecha" type="text" class="form-control" name="fecha" value="{{ $cita->fecha or old('fecha') }}" required autofocus>

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
                                            <option value="{{$usuario->id}}" @if($usuario->id == $cita->user->id)selected @endif>{{$usuario->nombre." ".$usuario->apellido}}</option>
                                        @endforeach
                                    </select>
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
                                    <select name="especialidad" id="especialidad" class="form-control" >
                                        @foreach($especialidad as $especialidad)
                                            <option value="{{$especialidad->id}}" @if($especialidad->descripcion == $cita->especial->descripcion)Selected @endif>{{$especialidad->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('especialidad'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('especialidad')}}</strong>
                                    @endif
                                </div>
                            </div>

                    <div class="form-group{{$errors->has('medico') ? 'has-error' : ''}}">
                        <label for="medico" class="col-md-4 control-label">medico</label>
                        <div class="col-md-6">
                            <select name="medico" id="medico" class="form-control" >
                                @foreach($medico as $medicos)
                                    <option value="{{$medicos->id}}" @if($medicos->nombre == $cita->doctor->nombre) selected @endif>{{$medicos->nombre." ".$medicos->apellido}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('medico'))
                                <span class="help-block"></span>
                                <strong>{{$errors->first('medico')}}</strong>
                            @endif
                        </div>
                    </div>
                            <div class="form-group{{$errors->has('observaciones') ? 'has-error' : ''}}">
                                <label for="informe" class=" col-md-4 control-label">Motivo</label>
                                <div class="col-md-6">
            <textarea name="observaciones" id="observaciones" cols="10" rows="2"
                      class="form-control">{{$cita->observaciones or  old('observaciones')}}</textarea>

                                    @if($errors->has('observaciones'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('observaciones')}}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('historia') ? 'has-error' : ''}}">
                                <label for="paciente" class="col-md-4 control-label">Agregar a historia</label>
                                <div class="col-md-6">
                                    <select name="historia" id=historia" class="form-control" required>
                                        @foreach($historia as $usuario)
                                            <option value="{{$usuario->id}}" @if($usuario->id == $cita->historia->id) selected @endif>{{"Historia N°: ".$usuario->id." |  de ".$usuario->user->nombre." ".$usuario->user->apellido}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('historia'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('historia')}}</strong>
                                    @endif
                                </div>
                            </div>



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
