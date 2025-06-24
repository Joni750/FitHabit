@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')
    <button><a href="{{ route('productos.create') }}">Crear nuevo producto</a></button>
    <table>

        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Imagén</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        @foreach ($products as $product)
        <tbody>
          <tr>

            <td>{{$product->id}} </td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->image}}</td>
            <td><a href="{{ route('productos.edit', $product->id) }}"><img src="{{asset('images/admin/edit.svg')}}"></a></td>
            <form  action="{{ route('productos.destroy', [$product->id]) }}" method="POST">
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
