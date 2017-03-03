@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Usuario</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/usuarios/'.$usuario->id) }}">
                            {{ method_field('PUT')}}
                            {{ csrf_field()}}

                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <label for="nombre" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $usuario->nombre or old('nombre') }}" required autofocus>

                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control" name="apellido" value="{{ $usuario->apellido or old('apellido') }}" required autofocus>

                                    @if ($errors->has('apellido'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                                <label for="cedula" class="col-md-4 control-label">Cedula</label>

                                <div class="col-md-6">
                                    <input id="cedula" type="text" class="form-control" name="cedula" value="{{$usuario->cedula or old('cedula') }}" required autofocus>

                                    @if ($errors->has('cedula'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
                                <label for="fecha_nac" class="col-md-4 control-label">Edad</label>

                                <div class="col-md-6">
                                    <input id="fecha_nac" type="text" class="form-control" name="fecha_nac" value="{{$usuario->fecha_nac or old('fecha_nac') }}" required autofocus>

                                    @if ($errors->has('fecha_nac'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fecha_nac') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                <label for="direccion" class="col-md-4 control-label">Direccion</label>

                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $usuario->direccion or old('direccion') }}" required autofocus>

                                    @if ($errors->has('direccion'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label for="telefono" class="col-md-4 control-label">Telefono</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $usuario->telefono or old('telefono') }}" required autofocus>

                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                                <label for="celular" class="col-md-4 control-label">Celular</label>

                                <div class="col-md-6">
                                    <input id="celular" type="text" class="form-control" name="celular" value="{{ $usuario->celular or old('celular') }}" required autofocus>

                                    @if ($errors->has('celular'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                                <label for="sexo" class="col-md-4 control-label">Sexo</label>
                                <label class="radio-inline" style="margin-left:2%;"><input type="radio" name="sexo" value="femenino" @if($usuario->sexo == "femenino") checked @endif>F</label>
                                <label class="radio-inline"><input type="radio" name="sexo" value="masculino" @if($usuario->sexo == "masculino") checked @endif>M</label>
                                @if ($errors->has('sexo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email or old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>


                                <div class="form-group{{$errors->has('role') ? 'has-error' : ''}}">
                                    <label for="role" class="col-md-4 control-label">Rol</label>
                                    <div class="col-md-6">
                                        <select name="role" id="role" class="form-control" >

                                            @foreach($roles as $role)
                                                <option value="{{$role->name}}" @if($usuario->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('role'))
                                            <span class="help-block"></span>
                                            <strong>{{$errors->first('role')}}</strong>
                                        @endif
                                    </div>
                                </div>

                            <div class="form-group{{$errors->has('espe') ? 'has-error' : ''}}">
                                <label for="especialidad" class="col-md-4 control-label">Especialidad</label>
                                <div class="col-md-6">
                                    <select name="especialidad" id="especialidad" class="form-control" >
                                        <option value="4" selected>Seleccione en caso de ser medico</option>
                                        @foreach($espe->slice(0,3) as $espe)

                                            <option value="{{$espe->id}}" @if($espe->descrpcion=="n/a") selected @endif>{{$espe->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('especialidad'))
                                        <span class="help-block"></span>
                                        <strong>{{$errors->first('especialidad')}}</strong>
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
                                        Register
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
