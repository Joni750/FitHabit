@extends('layout.masterpage')

@section('contenido')
<link rel="stylesheet" href="{{asset("css/inicio.css")}}">
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&display=swap" rel="stylesheet">

<body>


    {{-- <div id="indexLogo"> --}}
        {{-- <img  src="{{asset("images/unai/FitHabitLogoWhite.png")}}"> --}}
    {{-- </div> --}}
    <div id="textoIndex">
        <h2 class="tituloInicio">{{__('index.title')}}</h2>
        <p id="pIndex">{{__('index.text')}}</p>
    </div>
    {{--
    <div class="cajaContacto">
    <div class="containerContacto">
        <div class="card">
          <div class="front">
            <div class="card-top">
              <p class="card-top-para">Contacto</p>
            </div>
            <img class="imgH" src="{{"images/logo/LogoH.png"}}">

            <p class="follow">+34 667 654 986</p>
            <p class="follow">fithabitoficial@gmail.com</p>
            <p class="follow">Bilbao, Bizkaia</p></div>
          <div class="back">
            <p class="heading">Información</p>

            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
              <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
              <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"></path>
            </svg>


          </div>
        </div>
      </div>
    </div>--}}
    <div class="carousel-container">
        <div class="carousel">
            <div class="carousel-slide">
                <img src="{{asset("images/unai/ftCarrusel1.jpg")}}" alt="Imagen 1">
            </div>
            <div class="carousel-slide">
                <img src="{{asset("images/unai/ftCarrusel2.jpg")}}" alt="Imagen 2">
            </div>
            <div class="carousel-slide">
                <img src="{{asset("images/unai/ftCarrusel3.jpg")}}" alt="Imagen 3">
            </div>
            <!-- Agrega más imágenes según sea necesario -->
        </div>
        <div class="arrow left-arrow">&#8249;</div>
        <div class="arrow right-arrow">&#8250;</div>
        <div class="dots-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <!-- Agrega más puntos según el número de imágenes -->
        </div>
    </div>

    <section class="contact">

    <h2 class="tituloInicio" >Contáctanos</h2>

        <div class="flex-cont">

            <p>Num: +34 978 657 432</p>

            <p>Email: fithabitoficial@gmail.com</p>



        </div>

    </section>

</body>
<script src="{{ asset('js/carrusel.js') }}"></script>
@endsection
