@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')
    <div class="container">
        <h1>Crear Tipo de Suscripción</h1>

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

        <form action="{{ route('tiposSuscripciones.store') }}" method="post">
            @csrf
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" required>

            <label for="months">Meses:</label>
            <input type="number" name="months" id="months" required>

            <label for="price">Precio:</label>
            <input name="price" id="price" step="0.2" required>

            <label for="benefits">Beneficios:</label>
            <input type="text" name="benefits" id="benefits" required>

            <button type="submit">Crear Tipo de Suscripción</button>
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
