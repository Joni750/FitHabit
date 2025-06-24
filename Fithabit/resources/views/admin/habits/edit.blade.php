@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')
    <div class="container">
        <h1>Modificar Hábito</h1>

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

        <form action="{{ route('habitos.update', $habit->id) }}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @foreach ($locales as $locale)

                <label for="name_{{$locale}}">Nombre ({{$locale}}):</label>
                <input type="text" name="name_{{$locale}}" id="name" value="{{$habit->name}}" required>

                <label for="value_{{$locale}}">Valor ({{$locale}}):</label>
                <textarea name="value_{{$locale}}" id="value" required>{{$habit->value}}</textarea>

            @endforeach

            <label for="image">Imagen:</label>
            <input type="file" name="image" id="image" value="{{$habit->image}}" required>

            <button type="submit">Actualizar Hábito</button>
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
