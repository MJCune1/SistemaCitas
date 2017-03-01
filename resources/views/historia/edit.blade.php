@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Historia Nro:{{$historia->id}} {{$historia->user->nombre." ".$historia->user->apellido}}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/historias'.$historia->id) }}">
                            {{ method_field('PUT')}}
                            {{ csrf_field()}}



                            

                            <div class="form-group{{$errors->has('informe') ? 'has-error' : ''}}">
                                <label for="informe" class=" col-md-4 control-label">Observaciones informe</label>
                                <div class="col-md-6">
            <textarea name="informe" id="informe" cols="10" rows="2"
                      class="form-control">{{$historia->informe or  old('informe')}}</textarea>

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
