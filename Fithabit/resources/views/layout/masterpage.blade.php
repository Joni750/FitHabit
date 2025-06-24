<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link rel="icon" href="../../../../favicon.ico"> --}}

    {{-- LIBRERIAS --}}
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css " rel="stylesheet">
    {{-- LIBRERIAS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300&display=swap" rel="stylesheet">
    <title>Pruebas - @yield("titulo")</title>
    <script>
        window.onload = function() {
            console.log('La página se ha cargado.');

            // Define las dimensiones deseadas para la ventana
            var width = 800;
            var height = 600;
            // Redimensiona la ventana del navegador
            window.resizeTo(width, height);
            // Centra la ventana en la pantalla
            var left = (window.screen.width - width) / 2;
            var top = (window.screen.height - height) / 2;
            window.moveTo(left, top);
        };
    </script>
    <!-- Custom styles for this template  -->
    {{-- <link href = '{{ asset("/css/app.css") }}' rel="stylesheet"> --}}
    <link href=" {{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href = "{{ asset('/css/nav-menu.css') }}" rel="stylesheet">
    @yield("estilos")


</head>

  <body>
    @include('layout.nav')

    <main role="main" class="container">

        {{-- {{dd(url()->current())}} --}}
        {{-- @if(auth()->user() != null) --}}

            {{-- redireccion para el inicio de sesion --}}

            {{-- @else --}}
            {{-- Aqui le indicaremos a Laravel que cada seccion de nuestra pagina se inyectará aqui --}}
            @yield('contenido')

        {{-- @endif --}}

    </main>

{{-- Si no estas en el Menu, no se mostrará el carrito de la compra --}}
    @if(url()->current() == route("menu.index"))
        <footer>
            @include('products.car')
                @yield('carrito')
        </footer>
    @endif


{{-- Si no estas en el Menu, no se mostrará el carrito de la compra --}}
@if(url()->current() == route("lista_habitos.index"))
<footer>
    @include('habits.addHabito')
        @yield('addhabito')
</footer>
@endif
<button class="toTop" id="toTop" style="outline: none;">
    <svg viewBox="0 0 24 24">
      <path d="m4 16 8-8 8 8"></path>
    </svg>
  </button>
</body>




{{-- LIBRERIAS --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>


{{-- LIBRERIAS --}}

  <script src="{{asset('/js/app.js')}}"></script>
  <script src="{{asset('js/pruebasjs.js')}}"></script>


  </html>
