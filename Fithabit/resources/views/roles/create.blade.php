@extends('layout.masterpage')
@section("titulo")
Crear Roles
@endsection


@section('contenido')

<h1> Creación de roles</h1>
<br>


<form action="{{route("rol.store")}}" method="post">
    @csrf
<label>Nombre del rol</label><br>
<input type="text" name="rol_name" placeholder="Santa, Olentzero...">
<br>
<input type="submit" value="Crear">

</form>
@endsection
