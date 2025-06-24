@extends('layout.masterpage')

@section('contenido')
<link rel="stylesheet"  href="{{asset("css/planes.css")}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&display=swap" rel="stylesheet">

<body id="fondoPlanes">

    <div id="planesLogo">
        <img id="ftLogoPlanes" src="{{asset("images/unai/FitHabitLogoWhite.png")}}">
    </div>


     <form method="POST" action="{{ route('seleccionar.plan') }}" id="formSuscripcion" >
        @csrf

    <section id="tdsBtn">
        <button class="boton" name="tipo_suscripcion" value="gratuita" style="outline: none;">
            <div class="lineaTxtBtn">
                <p>PLAN GRATUITO</p>
                <p>0€</p>
            </div>
        </button>
        <button class="boton" name="tipo_suscripcion" value="mensual" style="outline: none;">
            <div class="lineaTxtBtn">
                <p>PLAN MENSUAL</p>
                <p>29.99€</p>
            </div>
        </button>
        <button class="boton" name="tipo_suscripcion" value="trimestral" style="outline: none;">
            <div class="lineaTxtBtn">
                {{-- <div class="xdxd"> --}}
                <p>PLAN TRIMESTRAL</p>
            {{-- </div> --}}
                {{-- <div> --}}
                <p>84.99€</p>
                {{-- <p class="precioMes">28.33€/mes</p> --}}
            </div>
            </div>
        </button>
            <button class="boton" name="tipo_suscripcion" value="anual" style="outline: none;">
                <div class="lineaTxtBtn">
                    {{-- <div class="xdxd"> --}}
                    <p>PLAN ANUAL</p>
                {{-- </div> --}}
                    {{-- <div> --}}
                    <p>319.99€</p>
                    {{-- <p class="precioMes">26.66€/mes</p> --}}
                </div>
                </div>
            </button>
             </section>
             <p class="lnkIncioSesion">¿Ya estás dado de alta? <a class="verdeIncioSesion" href="{{route("login")}}"> &nbsp ¡Inicia sesión aquí!</a></p>

            </form>


</body>

@endsection
