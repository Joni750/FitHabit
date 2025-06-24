@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')

    <table>

        <thead>
          <tr>
            <th>ID</th>
            <th>ID_Usuario</th>
            <th>Tipo de suscripción</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th></th>
          </tr>
        </thead>
        @foreach ($suscriptions as $suscription)
        <tbody>
          <tr>

            <td>{{$suscription->id}} </td>
            <td>{{$suscription->user_id}}</td>
            <td>{{$suscription->id_suscription_type}}</td>
            <td>{{$suscription->suscription_date}}</td>
            <td>{{$suscription->estatus}}</td>

            <form  action="{{ route('suscripciones.destroy', [$suscription->id]) }}" method="POST">
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
    <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}">
    <link rel="stylesheet" href="../css/admin/tablas.css">

@stop
