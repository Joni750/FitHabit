@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')
    <div class="container">
        <h1>Modificar Tipo de Suscripción</h1>

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

        <form action="{{ route('tiposSuscripciones.update', $tiposSuscriptions->id) }}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="name">Nombre :</label>
            <input type="text" name="name" id="name" value="{{$tiposSuscriptions->name}}" required>

            <label for="months">Meses :</label>
            <input type="number" name="months" id="months" value="{{$tiposSuscriptions->months}}" required>

            <label for="price">Precio:</label>
            <input name="price" id="price" step="0.2" value="{{$tiposSuscriptions->price}}" required>

            <label for="benefits">Beneficios:</label>
            <input type="text" name="benefits" id="benefits" value="{{$tiposSuscriptions->benefits}}" required>

            <button type="submit">Actualizar Tipo de Suscripción</button>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="../../../css/admin/formularios.css">
    <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
