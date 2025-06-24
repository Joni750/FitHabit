@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')
    <div class="container">
        <h1>Modificar Usuario</h1>

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

        <form action="{{ route('usuarios.update', $user->id) }}" method="post"  enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{$user->name}}" required>

            <label for="lastname">Apellido:</label>
            <input type="text" name="lastname" id="lastname" value="{{$user->lastname}}" required>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="{{$user->email}}" required>

            <label for="dni">DNI:</label>
            <input type="text" name="dni" id="dni" value="{{$user->dni}}" required>

            <div class="cajaText_label">
                <label for="sex" class="label">Sexo</label>
                <div class="radio-input">
                    <label>
                        <input type="radio" id="value-1" name="sex" value="Hombre">
                        <span>Hombre</span>
                    </label>

                    <label>
                        <input type="radio" id="value-2" name="sex" value="Mujer">
                        <span>Mujer</span>
                    </label>

                    <label>
                        <input type="radio" id="value-3" name="sex" value="Ns/Nc">
                        <span>Ns/Nc</span>
                    </label>
                    <span class="selection"></span>
                </div>

              </div>
              @error('sex')
              <span class="invalid-feedbackk" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar" id="avatar" value="{{$user->avatar}}" required>

            <button type="submit">Actualizar Usuario</button>

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
