@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Mis Citas</div>

                    <div class="panel-body">
                        <div class="row">

                            @foreach ($citas as $curso)

                                <div class="col-md-4">

                                    <div class="thumbnail">
                                        <div>
                                            <h3>Fecha: {{ $curso->fecha }}</h3>
                                            <h4>Doctor: {{ $curso->doctor->nombre." ".$curso->doctor->apellido}}</h4>
                                            <p>Especialidad: {{ $curso->especial->descripcion }}</p>

                                            <p>
                                                <a href="{{ url('/cursos/'.$curso->id.'/postular') }}"
                                                   class="btn btn-success">Aplazar</a>
                                            </p>

                                        </div>
                                    </div>
                                <!--<table class="table table bordered">
    <tr>
        <td>{{$curso->nombre}}</td>
    </tr>
    <tr>
        <td>{{$curso->descripcion}}</td>
    </tr>
    <tr>
        <td><a href="{{url('cursos/'.$curso->id.'postular')}}" class="btn btn-success">Postular</a></td>

    </tr>
</table>-->

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
