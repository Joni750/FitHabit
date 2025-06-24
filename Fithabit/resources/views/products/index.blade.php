@extends('layout.masterpage')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection
@section('contenido')

<body class="bgbody">
        <!-- top -->
        <div class="text-light">
            <h1 class="my-4 mx-2">{{__('product.title')}}</h1>
            <input id="ver" class="text-light bg-transparent h-4" type="image" src="{{asset('images/productos/carrito.svg')}}" onclick="verCarrito()" value="Ver carrito">
        </div>
                <!--product  -->
                {{-- @foreach(Session::all()['cart'] as $car) --}}
                    {{-- {{-- <h1 class="text-light">{{$car->name}}</h1> --}}
                    {{-- @foreach ($session as $car)

                        {{dd($car)}}
                     @endforeach --}}



                @foreach($menu as $producto)


        <section class="d-flex text-light justify-content-center my-5">

            <div class="carta d-flex  p-2">
                <!-- Image -->
                <div class="w-50 d-flex align-items-center">

                    <img class="w-100 rounded-circle" alt="{{$producto->name}}" src="{{asset("images/productos/$producto->image")}}">

                </div>
                <!-- Product info -->
                <div class="d-flex flex-column justify-content-center p-33 w-50">
                    <div>
                        <div >

                            <p class="h4">{{$producto->name}}</p>
                            <p class="h-5">{{$producto->price}}€ - {{__('product.p')}}</p>

                        </div>
                            {{-- descripcion --}}
                        <p>{{$producto->description}}</p>

                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="bgbutton">
                            {{-- {{dd($producto->id)}} --}}
                            <a href="addProduct/{{$producto->id}}">{{__('product.button')}}</a>
                        </button>
                    </div>
                </div>
            </div>


        </section>
        @endforeach
</body>

    @endsection
