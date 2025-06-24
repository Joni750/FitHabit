@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')
    <button><a href="{{ route('habitos.create') }}">Crear nuevo hábito</a></button>
    <table>

        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Valor</th>
            <th>Imagén</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        @foreach ($habits as $habit)
        <tbody>
          <tr>

            <td>{{$habit->id}} </td>
            <td>{{$habit->name}}</td>
            <td>{{$habit->value}}</td>
            <td>{{$habit->image}}</td>
            <td><a href="{{ route('habitos.edit', $habit->id) }}"><img src="{{asset('images/admin/edit.svg')}}"></a></td>
            <form  action="{{ route('habitos.destroy', [$habit->id]) }}" method="POST">
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
