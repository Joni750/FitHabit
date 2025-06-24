@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')
    <div class="container">
        <h1>Crear Reserva</h1>

        @if ($errors->any())
            <div class="error">
                <strong>Error al validar el formulario</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservas.store') }}" method="post">
            @csrf
            <label for="date">Fecha:</label>
            <input type="date" name="date" id="name" required>

            <label for="time">Hora:</label>
            <input type="time" name="time" id="description" required>

            <label for="people">Num_personas:</label>
            <input type="number" name="people" id="price" required>

            <label for="user_id">ID_Usuario:</label>
            <input type="number" name="user_id" id="price" required>

            <button type="submit">Crear Reserva</button>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="../../css/admin/formularios.css">
    <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
