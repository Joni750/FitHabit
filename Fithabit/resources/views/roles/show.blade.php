@extends('layout.masterpage')
@section("titulo")
Vista en detalle
@endsection
@section('contenido')
        <h1>
            {{$role -> id}}
        </h1>
            <p>Esta es la vista en detalle del {{$role -> name}}</p>

@endsection
