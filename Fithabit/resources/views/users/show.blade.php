@extends('layout.masterpage')
@section("titulo")
Vista en detalle
@endsection
@section('contenido')
<link rel="stylesheet"  href="{{asset("css/perfil.css")}}">
<meta name="csrf-token" content="{{ csrf_token() }}">



    <div class="top">
    <h1 class="titulos">{{__('profile.title')}}</h1>
    </div>
<section class="profile">
    <div class="profile-card">
        {{-- <div class="profile-image"> --}}
            {{-- <img class="fill" src="../profile-circle-svgrepo-com.svg" alt="profile"> --}}
        {{-- </div> --}}
        <div class="cajaAvatarContainer">

        <div class="cajaAvatar" >
        @if ($user->avatar)
        <img class="ftPerfil" src="{{ asset('images/ftperfil/' . auth()->user()->avatar) }}" alt="Imagen de perfil">

    @else
        <!-- Mostrar una imagen predeterminada si el usuario no tiene una imagen de perfil -->
        <img class="ftPerfil" src="{{ asset('images/ftperfil/default.png') }}" alt="Imagen de perfil predeterminada">
    @endif
</div>
    <form id="formSubirAvatar" enctype="multipart/form-data">
        @csrf

        <div class="botonSubirAvatar">
            <label for="img">{{__('profile.img')}}</label>
            <input type="file" id="img" name="img" accept="image/*" onchange="subirImagen()">
            {{-- <button type="submit" class="btnActAvatar">Actualizar avatar</button> --}}
        </div>

    </form>

        <div class="profile-information">
                <p>{{$user->name}} {{$user->lastname}}</p>
        </div>
    </div>
</section>

<section class="information">
    <div class="information-card">

        <div class="information-placements">
            <div class="information-content">
                <img src={{ asset('images/unai/mail.svg') }}>
                <div class="dtsPerfil">
                <p>{{$user->email}}</p>
            </div>
            </div>
            <div class="information-content">
                <img src={{ asset('images/unai/cumple.svg') }}>
                <div class="dtsPerfil">

                <p>{{$user->birth_day}}</p>
            </div>
            </div>
            <div class="information-content">
                <img src={{ asset('images/unai/dni.svg') }}>
                <div class="dtsPerfil">

                <p>{{$user->dni}}</p>
            </div>
            </div>
            <div class="information-content">
                <img src={{ asset('images/unai/sex.svg') }}>
                <div class="dtsPerfil">

                <p>{{$user->sex}}</p>
            </div>
            </div>
            <div class="information-content">
                <img src={{ asset('images/unai/reloj.svg') }}>
                    @php
                        $expiracion = Carbon\Carbon::parse($user->suscriptions->suscription_date);
                        $tipoSuscripcion = $user->suscriptions->suscriptionType->name;

                        // Calcula la fecha de expiración según el tipo de suscripción
                        switch ($tipoSuscripcion) {
                            case 'gratuita':
                                $expiracionTexto = 'Suscripción gratuita';
                                break;
                            case 'mensual':
                                $expiracion->addMonth(); // Añade 1 mes
                                $expiracionTexto = 'Expira el: ' . $expiracion->format('d/m/Y');
                                break;
                            case 'trimestral':
                                $expiracion->addMonths(3); // Añade 3 meses
                                $expiracionTexto = 'Expira el: ' . $expiracion->format('d/m/Y');
                                break;
                            case 'anual':
                                $expiracion->addYear(); // Añade 1 año
                                $expiracionTexto = 'Expira el: ' . $expiracion->format('d/m/Y');
                                break;
                            default:
                                $expiracionTexto = 'Tipo de suscripción desconocido';
                                break;
                        }
                    @endphp

<div class="dtsPerfil">
    @if ($user->suscriptions)
        <p>{{ $expiracionTexto }}</p>
    @else
        <p>{{__('profile.text')}}</p>
    @endif
</div>
            </div>
        </div>
    </div>
</section>
<section class="reserva">
<h1 class="titulos">{{__('profile.title2')}}</h1>
@if ($reservations->isEmpty())
        <p class="txtNo">{{__('profile.p')}}</p>
    @else
@foreach ($reservations as $reservation)
<div class="reservasBox">
<div class="txtReservas">
    <div>
    <p><strong>{{__('profile.p2')}}:</strong></p></div>
    <div> {{ $reservation->date }}</div>
</div>
<div class="txtReservas">
    <div>
    <p><strong>{{__('profile.p3')}}:</strong></p></div>
    <div> {{ $reservation->time }}</div>
</div>
<div class="txtReservas">
    <div>
    <p><strong>{{__('profile.p4')}}:</strong></p></div>
    <div> {{ $reservation->people }}</div>
</div>
</div>
@endforeach
@endif

</section>

<section class="pedido">
    <h1 class="titulos">{{__('profile.title3')}}</h1>
    @if ($orders->isEmpty())
    <p class="txtNo">{{__('profile.p5')}}</p>
@else
    @foreach ($orders as $order)
    <div class="pedidoBox">
    <div class="txtPedidos">
        <div> <p><strong>{{__('profile.p6')}}:</strong></p></div>
         <div>{{ $order->id }}</div>
    </div>
    <div class="txtPedidos">
        <div> <p><strong>{{__('profile.p7')}}:</strong></p></div>
         <div>{{ $order->payment_date }}</div>
    </div>
    <div class="txtPedidos">
        <div> <p><strong>{{__('profile.p8')}}:</strong></p></div>
         <div>{{ $order->delivery_date }}</div>
    </div>
    <div class="txtPedidos">
        <div> <p><strong>{{__('profile.p9')}}:</strong></p></div>
         <div>{{ $order->orderDetails->count() }}</div>
    </div>
    </div>
@endforeach
@endif
</section>
<section class="buttons">
    <div class="buttons-container">
        <button class="button-inf green" style="outline: none;" onclick="event.preventDefault();document.getElementById('logout').submit();">{{__('profile.button')}}</button>
        <form id="logout" method="post" action="{{route("logout")}}">
            @csrf
          </form>
    </div>
</section>
<script>
function subirImagen() {
    let formData = new FormData();
    formData.append('img', document.getElementById('img').files[0]);

    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    $.ajax({
        url: "{{ route('perfil.uploadImage') }}",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {


            setTimeout(function(){
                location.reload();
            }, 100);
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error al subir la imagen');
        }
    });
}
</script>
@endsection
