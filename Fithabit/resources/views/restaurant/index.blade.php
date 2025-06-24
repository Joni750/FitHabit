@extends('layout.masterpage')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/restaurante.css') }}">

{{--  --}}
<style>
    .container{
        color:white;
    }
</style>
{{--  --}}
@endsection
@section('contenido')
    <h1 class="titulo">{{__('restaurant.title')}}</h1>
    <div class="cajatxtrestaurante">
    <p class="txtRestaurante">{{__('restaurant.text')}}</p>
</div>
    {{--  --}}
    <div class="carousel-container">
        <div class="carousel">
            <div class="carousel-slide">
                <img src="{{asset("/images/restaurante/carru2.jpg")}}" alt="Imagen 1">
            </div>
            <div class="carousel-slide">
                <img src="{{asset("/images/restaurante/carru1.jpg")}}" alt="Imagen 2">
            </div>
            <div class="carousel-slide">
                <img src="{{asset("/images/restaurante/carru3.jpg")}}" alt="Imagen 3">
            </div>
            <!-- Agrega más imágenes según sea necesario -->
        </div>
        <div class="arrow left-arrow">&#8249;</div>
        <div class="arrow right-arrow">&#8250;</div>
        <div class="dots-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
            <!-- Agrega más puntos según el número de imágenes -->
    {{--  --}}

<h2 class="titulo">{{__('restaurant.title2')}}</h2>
    <div class="container col-sm-4 col-md-7 col-lg-4 mt-5">
        <div class="cardCalendar">
            <div class="botonesFlechas">

                <button class="tamaFlecha" id="previous" onclick="previous()"><img src="{{asset("/images/unai/leftArrow.svg")}}"></button>
                <h3 class="card-header" id="monthAndYear"></h3>
                <button class="tamaFlecha" id="next" onclick="next()"><img src="{{asset("/images/unai/rightArrow.svg")}}"></button>
            </div>

            <table class="table table-bordered table-responsive-sm" id="calendar">
                <div class="diasSemana">
                <p>{{__('restaurant.sunday')}}</p>
                <p>{{__('restaurant.monday')}}</p>
                <p>{{__('restaurant.tuesday')}}</p>
                <p>{{__('restaurant.wednesday')}}</p>
                <p>{{__('restaurant.thursday')}}</p>
                <p>{{__('restaurant.friday')}}</p>
                <p>{{__('restaurant.saturday')}}</p>
            </div>
                <tbody id="calendar-body">

                </tbody>
            </table>

        </div>
    </div>
            <br/>
            <div class="cajasOptions">
             <form class="form-inline ">
                <label class="lead mr-2 ml-2" for="month"></label>
                <select class="form-control col-sm-4 " name="month" id="month" onchange="jump()">
                    <option value=0>{{__('restaurant.january')}}</option>
                    <option value=1>{{__('restaurant.february')}}</option>
                    <option value=2>{{__('restaurant.march')}}</option>
                    <option value=3>{{__('restaurant.april')}}</option>
                    <option value=4>{{__('restaurant.may')}}</option>
                    <option value=5>{{__('restaurant.june')}}</option>
                    <option value=6>{{__('restaurant.july')}}</option>
                    <option value=7>{{__('restaurant.august')}}</option>
                    <option value=8>{{__('restaurant.september')}}</option>
                    <option value=9>{{__('restaurant.october')}}</option>
                    <option value=10>{{__('restaurant.november')}}</option>
                    <option value=11>{{__('restaurant.december')}}</option>
                </select>


                <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
                    <option value="2024" selected>2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>

            </select></form></div>



    {{-- Radio Buttons --}}

    <h2 class="titulo">{{__('restaurant.title3')}}</h2>

    <section id="flex-container2">
            <div class="radio-input">
                <input value="130000" name="value-radio" id="13:00" type="radio">
                <label for="13:00">13:00</label>
                <input value="133000" name="value-radio" id="13:30" type="radio">
                <label for="13:30">13:30</label>
                <input value="140000" name="value-radio" id="14:00" type="radio">
                <label for="14:00">14:00</label>
                <input value="143000" name="value-radio" id="14:30" type="radio">
                <label for="14:30">14:30</label>
            </div>

            <div class="radio-input">
                <input value="150000" name="value-radio" id="15:00" type="radio">
                <label for="15:00">15:00</label>
                <input value="153000" name="value-radio" id="15:30" type="radio">
                <label for="15:30">15:30</label>
                <input value="160000" name="value-radio" id="16:00" type="radio">
                <label for="16:00">16:00</label>
                <input value="163000" name="value-radio" id="16:30" type="radio">
                <label for="16:30">16:30</label>
            </div>
            <div class="radio-input">
                <input value="200000" name="value-radio" id="20:00" type="radio">
                <label for="20:00">20:00</label>
                <input value="203000" name="value-radio" id="20:30" type="radio">
                <label for="20:30">20:30</label>
                <input value="210000" name="value-radio" id="21:00" type="radio">
                <label for="21:00">21:00</label>
                <input value="213000" name="value-radio" id="21:30" type="radio">
                <label for="21:30">21:30</label>
            </div>
            <div class="radio-input">
                <input value="220000" name="value-radio" id="22:00" type="radio">
                <label for="22:00">22:00</label>
                <input value="223000" name="value-radio" id="22:30" type="radio">
                <label for="22:30">22:30</label>
                <input value="230000" name="value-radio" id="23:00" type="radio">
                <label for="23:00">23:00</label>
                <input value="233000" name="value-radio" id="23:30" type="radio">
                <label for="23:30">23:30</label>
            </div>
    </section>

    <div class="botonPedir" >
        <button onclick="people()" class="pedir" style="outline: none;">{{__('restaurant.button')}} </button>
    </div>
<br><br>
    <script src="{{ asset('js/carrusel.js') }}"></script>


    <script>


    /* VENTANA MODEL DEL SWEET ALERT PARA LA RESERVA Y OTRAS COSITAS */
    const people = () =>{



    let hora = document.querySelector('input[name="value-radio"]:checked').value;
    let fecha = document.querySelector("input[name='calendar-value']:checked").value;
    let horaBonito = document.querySelector("input[name='value-radio']:checked").id;

    console.log("Fecha de reserva -> ",fecha);
    console.log("Hora de la reserva -> ", hora);

    var swalInput;
    // var swalConf = document.getElementsByClassName("swal2-confirm")[0];

    Swal.fire({
    title: "Introduce el número de personas que asistirán",
    input: "number",
    inputLabel: "Si este número excede a 10 personas, llama directamente al local para realizar la reserva.",
    inputPlaceholder: "Introduce un número por favor",
    icon: "info",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Realizar reserva!"
    })
    .then((result) => {
    if (result.isConfirmed) {
        swalInput = document.getElementById("swal2-input").value;
        Swal.fire({
        title: "¡Reserva realizada!",
        text: "Su reserva con fecha "+fecha+" y hora "+horaBonito+"h ha sido agendada con éxito. \n numero de personas que asistirán: "+swalInput+" ",
        icon: "success",
        showConfirmButton: true,
        showCancelButton: true
    })
    // .then((cnf) => {
    //     if(cnf.isConfirmed){

    // }
    // })
}
        $.ajax({
                        type: "POST",
                        url: "{{ route('reserva.store') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            // prueba: "holiwis",
                            fechaReserva: fecha,
                            horaReserva: hora,
                            personaReserva: swalInput,
                        },
                        dataType: "json",
                        cache: false,
                        success: function (response) {
                            console.log(response);
                            // alert("enviado!");
                        },
                        error: function(error){
                            console.log("error-> ",error);
                        }
                    });
        });


    }


    </script>


@endsection
