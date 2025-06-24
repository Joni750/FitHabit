@extends('layout.masterpage')

@section('estilos')
    {{-- <link rel="stylesheet" href="{{ asset('css/pedido.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/restaurante.css') }}">
@endsection
@section('contenido')
    <h1 class="titulo">{{__('order.title')}}</h1>


    <section id="flex-container">

        {{-- productos de tu carrito y el precio final --}}

    </section>


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

    <button style="outline: none;" onclick="verModal()">
        {{__('order.button')}}
    </button>

    <script>

        /* VENTANA MODEL DEL SWEET ALERT PARA LA RESERVA Y OTRAS COSITAS */
        const verModal = () =>{

        let hora = document.querySelector('input[name="value-radio"]:checked').value;
         let horaBonito = document.querySelector("input[name='value-radio']:checked").id;
        var swalInput;
        // var swalConf = document.getElementsByClassName("swal2-confirm")[0];

        Swal.fire({
        title: "¿Está seguro que quiere realizar su pedido?",
        text: "Puede cancelar su pedido 30 minutos antes de la hora de recogida.",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Terminar mi pedido!",
        cancelButtonText: "Cancelar pedido"
        })
        .then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Pedido realizado!",
            text: "¡Su pedido está siendo realizado, gracias por comprar con nosotros!",

            icon: "success",

        })

        $.ajax({
            type: "POST",
            url: "{{ route('orden.store') }}",
            data: {
                _token: '{{ csrf_token() }}',
                horaOrden: hora,
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



        }

    })
    }

    </script>

@endsection
