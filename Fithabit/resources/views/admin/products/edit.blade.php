@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')
    <div class="container">
        <h1>Modificar Producto</h1>

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

        <form action="{{ route('productos.update', $product->id) }}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @foreach ($locales as $locale)

                <label for="name_{{$locale}}">Nombre ({{$locale}}):</label>
                <input type="text" name="name_{{$locale}}" id="name" value="{{$product->name}}" required>

                <label for="description_{{$locale}}">Descripción ({{$locale}}):</label>
                <textarea name="description_{{$locale}}" id="description" required>{{$product->description}}</textarea>

            @endforeach
            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" value="{{$product->price}}" step="0.01" required>

            <label for="image">Imagen:</label>
            <input type="file" name="image" id="image" value="{{$product->image}}" required>

            <button type="submit">Actualizar Producto</button>
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
