@extends('layout.masterpage')
@section("titulo")
Lista de coches
@endsection
@section("estilos")
<style>
    main{
        background-color: bisque;
    }
</style>
@endsection

@section('contenido')


        <h1> Lista de roles</h1>
        <h2>Ahora mismo solo tenemos estos roles</h2>
        <!-- Para hacer codigo en php, tenemos la forma normal que e sla siguiente:-->
        <?php ?>
        <!-- Podemos escribir la variable a pelo-->
        <!-- <h3>{{ $role }}</h3> -->
        <!-- o podemos poner los "arroba php" para escribir codigo php dentro de los delimitadores-->

        <table border="1">
            <tbody>

                    @foreach ($role as $rol)
                    <tr>
                    <td>Este es tu rol con id -> <a href="rol/{{$rol -> id}}">{{ $rol -> name }}</a></td>
                        <td>Este es tu rol con nombre -> {{ $rol -> name}}</td>
                        <td>Este es tu rol de creado-> {{ $rol -> created_at }}</td>

                    </tr>
                            @endforeach


            </tbody>
        </table>

    @endsection
