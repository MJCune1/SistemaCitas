@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de Citas</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/historias') }}">
                            {{ csrf_field('POST')}}
                            {{ csrf_field()}}


                            <div class="form-group{{ $errors->has('fecha_ingreso') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-4 control-label">Fecha de entrega</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="fecha_ingreso" value="">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                        @if ($errors->has('fecha_ingreso'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('fecha_ingreso') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('paciente') ? 'has-error' : ''}}">
                                <label for="paciente" class="col-md-4 control-label">Paciente</label>
                                <div class="col-md-6">
                                    <select name="paciente" id="paciente" class="form-control" required>
                                        <option value="" selected>Seleccione un paciente</option>
                                        @foreach($pacientes as $usuario)
                                            <option value="{{$usuario->id}}">{{$usuario->nombre." ".$usuario->apellido}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('paciente'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('paciente')}}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('medico') ? 'has-error' : ''}}">
                                <label for="paciente" class="col-md-4 control-label">Medico</label>
                                <div class="col-md-6">
                                    <select name="medico" id="medico" class="form-control" required>
                                        <option value="" selected>Seleccione medico tratante</option>
                                        @foreach($medicos as $usuario)
                                            <option value="{{$usuario->id}}">{{$usuario->nombre." ".$usuario->apellido}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('medico'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('medico')}}</strong>
                                    @endif
                                </div>
                            </div>


                            

                            <div class="form-group{{$errors->has('informe') ? 'has-error' : ''}}">
                                <label for="informe" class=" col-md-4 control-label">Observaciones informe</label>
                                <div class="col-md-6">
            <textarea name="informe" id="informe" cols="10" rows="2"
                      class="form-control">{{$curso->contenido or  old('informe')}}</textarea>

                                    @if($errors->has('informe'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('informe')}}</strong>
                                    @endif
                                </div>
                            </div>




                            <!--
                            Cita
                            especialidad
                            medico
                            usuario
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
