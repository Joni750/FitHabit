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
            <th>Hora de recogida</th>
            <th>Fecha del pago</th>
            <th>ID_Usuario</th>
            <th>Estado</th>
            <th></th>
          </tr>
        </thead>
        @foreach ($orders as $order)
        <tbody>
          <tr>

            <td>{{$order->id}} </td>
            <td>{{$order->delivery_date}}</td>
            <td>{{$order->payment_date}}</td>
            <td>{{$order->id_user}}</td>
            <td>{{$order->estatus}}</td>
            <form action="{{ route('pedidos.destroy', [$order->id]) }}" method="POST">
                @csrf
                @method('delete')
                <td><input class="papelera" type="image" src="{{asset('images/admin/papelera.svg')}}"></td>
            </form>

            {{-- <td>MODIFICAR</td> --}}
          </tr>
        </tbody>
        <p></p>
        @endforeach
    </table>

@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="../css/admin/tablas.css">
    <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}">

@stop
