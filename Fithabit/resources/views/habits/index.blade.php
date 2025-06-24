@extends('layout.masterpage')

@section("estilos")

<link rel="stylesheet" href="{{asset("css/habitos.css")}}">

@endsection
@section('contenido')
<h1 class="titulo">{{__('habit.title')}}</h1>



<section id="flex-container2">
    <p style="display: none">{{$index = 0}}</p>

    @foreach($habit_list as $hl)

{{-- <button > --}}
    <div class="cajas2" onclick="detallado('{{$index}}')">
        {{-- {{dd($hl)}} --}}
        <p class="id_habit_list" style="display:none">{{($habit_list[$index]->id)}}</p>
        <p class="id-habit" style="display:none">{{$hl->habit->id}}</p>
        <img src="{{asset($hl->habit->image)}}">

        <p class="nombre">{{$hl->habit->name}}</p>
        <div class="cajaCantHabi">
            <button onclick="actualizarContador('-', '{{$index}}'); event.stopPropagation();" class="mas" style="outline: none;">-</button>
            <p><span id="colorAzul"> <span class="cantidadIni">{{$hl->quantity_start}}</span> / <span class="cantidadFin">{{$hl->quantity_end}}</span> </span><br/> {{$hl->habit->value}}</p>
            <button onclick="actualizarContador('+', '{{$index}}'); event.stopPropagation();" class="mas" style="outline: none;">+</button>

    </div>
        <p style="display: none">{{$index++}}</p>

    </div>
{{-- </button> --}}


<script>
    const detallado = (index) => {
        console.log("index-> ",index); //-> depende de a cual clickees te devuelve la posicion en el array del hl

    //obtener el div de donde se va a sacar la info
    let getDiv = document.getElementsByClassName("cajas2")[index];
    let getId = document.getElementsByClassName("id-habit")[index].textContent;
    let getListId = document.getElementsByClassName("id_habit_list")[index].textContent;
    console.log("id lista" ,getListId);
    //obtener la info
    let getName = document.getElementsByClassName("nombre")[index].textContent;
    let getQuantityIni = document.getElementsByClassName("cantidadIni")[index].textContent;
    let getQuantityFin = document.getElementsByClassName("cantidadFin")[index].textContent;

    console.log("nombre -> ",getName, " cantidad Inicio -> "+getQuantityIni+" cantidad Fin "+ getQuantityFin);

    Swal.fire({
    title: "Vista detallada",
    html: "Nombre -> "+getName+" <br> Cantidad -> "+getQuantityIni+"/"+getQuantityFin+"",
    icon: "question",
    confirmButtonText: "Editar",
    cancelButtonText: "Cancelar",
    denyButtonText: "Eliminar de la lista",
    showCancelButton: true,
    showConfirmButton:true,
    showDenyButton: true,

    })
 //cuando sea confirm que se manden los datos cambiados
.then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
            title: "Modifica el valor de cuantas veces al día quieres hacer la tarea!",
            input: "range",
            icon: "info",
            confirmButtonText: "Aceptar",
            showConfirmButton: true,
            inputAttributes: {
                min: "1",
                max: "180",
                step: "1",
            },
            inputValue: "0",
        })
        .then((resultInput) => {
            if (resultInput.isConfirmed) {
                // Obtener el valor del input
                // console.log("se hace");
                const newRange = resultInput.value;
                // console.log("Value del input", newRange);
                // enviar datos
                $.ajax({
                    type: "PUT",
                    url: "{{ url('lista_habitos/update') }}/" + getId,
                    data: {
                        _token: '{{ csrf_token() }}',
                        nuevoValor: newRange,
                        // id_habito: getId,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);

                    },
                    error: function (error) {
                        console.log("error-> ", error);
                    }
                });
            }
        });
          //cuando sea deny que se elimine de la bd el habito DE TU LISTA
    }else if (result.isDenied){
                Swal.fire({
                title: "¿Seguro que quieres eliminar este hábito de tu lista?",
                text: "Podrás añadirlo de nuevo pulsando en el botón del más (+) ubicado abajo a la derecha de tu pantalla.",
                confirmButtonText: "Aceptar",
                cancelButtonText: "Cancelar",
                showConfirmButton: true,
                showCancelButton: true,
                icon: "question",
                })
                .then((resultDelete) => {
                    if(resultDelete.isConfirmed){
                        console.log("hola");
                        getListId = parseInt(getListId);
                    $.ajax({
                    type: "DELETE",
                    url: "{{ url('lista_habitos/destroy') }}/" + getListId ,
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                        // alert(response[0]);
                        location.reload();
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                }
                });
            }
});
//cierre del function
}
/*
const actualizarContador = (signo, index) =>{
    let listaID = document.getElementsByClassName("id_habit_list")[index].textContent;
    let cantidadIni = document.getElementsByClassName("cantidadIni")[index].textContent;
    let cantidadFin = document.getElementsByClassName("cantidadFin")[index].textContent;

    //pasarlas a un numero
    // cantidadIni = parseInt(getQuantityIni);

    console.log("cantidad inicial ->", cantidadIni);
    console.log("cantidad Fin ->", cantidadFin);

    if((signo == "+") && (cantidadIni != cantidadFin)){
        console.log("Boton + pulsado");
        cantidadIni++;
        $.ajax({
                    type: "PUT",
                    //el id del habito se pasa en la ruta
                    url: "{{ url('lista_habitos/actualizarContador') }}/" + listaID,
                    data: {
                        _token: '{{ csrf_token() }}',
                        valor: cantidadIni,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                        alert(response[0]);
                        location.reload();
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
    } else if(signo == "-"){
        cantidadIni--;
        console.log("Boton - pulsado");
        $.ajax({
                    type: "PUT",
                    //el id del habito se pasa en la ruta
                    url: "{{ url('lista_habitos/actualizarContador') }}/" + listaID ,
                    data: {
                        _token: '{{ csrf_token() }}',
                        valor: cantidadIni
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                        alert(response[0]);
                        location.reload();
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
    }
}
*/
const actualizarContador = (signo, index) => {
    let listaID = document.getElementsByClassName("id_habit_list")[index].textContent;
    let cantidadIni = parseInt(document.getElementsByClassName("cantidadIni")[index].textContent);
    let cantidadFin = parseInt(document.getElementsByClassName("cantidadFin")[index].textContent);

    console.log("cantidad inicial ->", cantidadIni);
    console.log("cantidad Fin ->", cantidadFin);

    if (signo === "+" && cantidadIni < cantidadFin) {
        console.log("Boton + pulsado");
        cantidadIni++;
    } else if (signo === "-" && cantidadIni > 0) {
        console.log("Boton - pulsado");
        cantidadIni--;
    }

    // Realizar la solicitud AJAX solo si ha cambiado la cantidad inicial
    if (cantidadIni !== parseInt(document.getElementsByClassName("cantidadIni")[index].textContent)) {
        $.ajax({
            type: "PUT",
            url: "{{ url('lista_habitos/actualizarContador') }}/" + listaID,
            data: {
                _token: '{{ csrf_token() }}',
                valor: cantidadIni,
            },
            dataType: "json",
            cache: false,
            success: function(response) {
                console.log(response);
                // alert(response[0]);
                location.reload();
            },
            error: function(error) {
                console.log("error-> ", error);
            }
        });
    }
}

</script>

    @endforeach

    <a onclick="verHabitos()" style="z-index:9;"> <img id="plus" src="{{asset("/images/habitos/plus.png")}}"></a>

</section>
@endsection
{{--





    --}}
