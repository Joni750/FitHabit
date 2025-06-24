@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')

    <button><a href="{{ route('tiposSuscripciones.create') }}">Crear nuevo tipo de suscripción</a></button>

    <table>

        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Meses</th>
            <th>Precio</th>
            <th>Beneficios</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        @foreach ($tiposSuscriptions as $tiposSuscription)
        <tbody>
          <tr>

            <td>{{$tiposSuscription->id}}</td>
            <td>{{$tiposSuscription->name}}</td>
            <td>{{$tiposSuscription->months}}</td>
            <td>{{$tiposSuscription->price}}</td>
            <td>{{$tiposSuscription->benefits}}</td>
            <td><a href="{{ route('tiposSuscripciones.edit', $tiposSuscription->id) }}"><img src="{{asset('images/admin/edit.svg')}}"></a></td>
            <form action="{{ route('tiposSuscripciones.destroy', [$tiposSuscription->id]) }}" method="POST">
                @csrf
                @method('delete')
                <td><input class="papelera" type="image" src="{{asset('images/admin/papelera.svg')}}"></td>
            </form>
            {{-- <td>MODIFICAR</td> --}}
          </tr>
        </tbody>
        @endforeach
    </table>

@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="../css/admin/tablas.css">
    <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}">

@stop
