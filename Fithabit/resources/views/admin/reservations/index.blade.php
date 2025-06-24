@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')
    <button><a href="{{ route('reservas.create') }}">Crear nueva reserva</a></button>
    <table>

        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Num_personas</th>
            <th>ID_usuario</th>
            <th></th>
          </tr>
        </thead>
        @foreach ($reservations as $reservation)
        <tbody>
          <tr>

            <td>{{$reservation->id}}</td>
            <td>{{$reservation->date}}</td>
            <td>{{$reservation->time}}</td>
            <td>{{$reservation->people}}</td>
            <td>{{$reservation->user_id}}</td>

            <form  action="{{ route('reservas.destroy', [$reservation->id]) }}" method="POST">
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
