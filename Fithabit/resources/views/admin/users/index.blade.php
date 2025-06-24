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
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>DNI</th>
            <th>Fecha de nacimiento</th>
            <th>Sexo</th>
            <th>Avatar</th>
            <th>Rol</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        @foreach ($users as $user)
        <tbody>
          <tr>
            <td>{{$user->id}} </td>
            <td>{{$user->name}}</td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->dni}}</td>
            <td>{{$user->birth_day}}</td>
            <td>{{$user->sex}}</td>
            <td>{{$user->avatar}}</td>
            <td>
                @if ($user->isAdmin())
                    Administrador
                @else
                    Usuario
                @endif
            </td>
            <td><a href="{{ route('usuarios.edit', $user->id) }}"><img src="{{asset('images/admin/edit.svg')}}"></a></td>
            <form  action="{{ route('usuarios.destroy', [$user->id]) }}" method="POST">
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
