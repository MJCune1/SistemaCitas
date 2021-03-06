@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Paciente: {{$recipe->user->nombre." ".$recipe->user->apellido}}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/recipes/'.$recipe->id) }}">
                            {{ method_field('PUT')}}
                            {{ csrf_field()}}

                            <div class="form-group{{ $errors->has('fecha_emision') ? ' has-error' : '' }}">
                                <label for="fecha_emision" class="col-md-4 control-label">fecha de emision</label>

                                <div class="col-md-6">
                                    <input id="fecha_emision" type="text" class="form-control" name="fecha_emision" value="{{ $recipe->fecha_emision or old('fecha_emision') }}" required autofocus readonly>
                                    @if ($errors->has('fecha_emision'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha_emision') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('fecha_entrega') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-4 control-label">Fecha de entrega</label>
                                <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="fecha_entrega" value="{{$recipe->fecha_entrega}}" readonly>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    @if ($errors->has('fecha_entrega'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha_entrega') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                </div>
                            </div>


                    {{--<div class="form-group{{ $errors->has('paciente') ? ' has-error' : '' }}">
                                <label for="fecha_entrega" class="col-md-4 control-label">fecha entrega</label>

                                <div class="col-md-6">
                                    <input id="paciente" type="text" class="form-control" name="paciente" value="{{$recipe->user->nombre." ".$recipe->user->apellido}}" readonly  >

                                    @if ($errors->has('paciente'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('paciente') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>--}}

                        {{-- <div class="form-group{{$errors->has('paciente') ? 'has-error' : ''}}">
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
                            </div>--}}
                            <div class="form-group{{$errors->has('estatus') ? 'has-error' : ''}}">
                                <label for="estatus" class="col-md-4 control-label">Estatus</label>
                                <div class="col-md-6">
                                    <input name="farmaceuta" id="farmaceuta" class="form-control" value="{{$recipe->status}}" readonly/>
                                    @if($errors->has('estatus'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('estatus')}}</strong>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{$errors->has('medico') ? 'has-error' : ''}}">
                                <label for="medico" class="col-md-4 control-label">Medico</label>
                                <div class="col-md-6">
                                    <se  required readonly>

                                            <input name="farmaceuta" id="farmaceuta" class="form-control" value="{{Auth::user()->nombre." ".Auth::user()->apellido}}" readonly/>


                                    @if($errors->has('medico'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('medico')}}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{$errors->has('observaciones') ? 'has-error' : ''}}">
                                <label for="observaciones" class=" col-md-4 control-label">Observaciones</label>
                                <div class="col-md-6">
            <textarea name="observaciones" id="observaciones" cols="10" rows="2"
                      class="form-control" @if(Auth::user()->hasRole('farmaceuta'))readonly @endif>{{$recipe->observaciones or  old('observaciones')}}</textarea>

                                    @if($errors->has('observaciones'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('observaciones')}}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('medicina_1') ? ' has-error' : '' }}">
                                <label for="medicina_1" class="col-md-4 control-label">Medicina 1</label>

                                <div class="col-md-6">
                                    <input id="medicina_1" type="text" class="form-control" name="medicina_1" value="{{ $recipe->medicina_1 or old('medicina_1') }}" @if(Auth::user()->hasRole('farmaceuta'))readonly @endif   autofocus>

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
                                    <input id="medicina_2" type="text" class="form-control" name="medicina_2" value="{{ $recipe->medicina_2 or old('medicina_2') }}" @if(Auth::user()->hasRole('farmaceuta'))readonly @endif   autofocus>

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
                                    <input id="medicina_3" type="text" class="form-control" name="medicina_3" value="{{$recipe->medicina_1 or old('medicina_3') }}" @if(Auth::user()->hasRole('farmaceuta'))readonly @endif  autofocus>

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
                                        Actualizar
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
