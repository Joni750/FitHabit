<link rel="stylesheet" href="{{asset("css/carrito.css")}}">

@if(Session::get('cart') != null)


        <section class="bg-customBody text-light rounded-top-5 p-4">
            <div class="d-flex justify-content-between">
                <div class="text-light h-2 fw-bolder">
                    <!-- equis -->
                    <span id ="equis" onclick="cerrarCarrito()" class="click">X</span>
                </div>
                <div class="text-light">
                    <!-- Articulos y numero -->
                    <h2>{{__('car.title')}}: {{count(Session::get('cart'))}}</h2>
                </div>
            </div>
    <!--PRODUCTOS  -->

{{-- @foreach(Session::get('cart') as $carrito) --}}

@foreach(Session::get('cart') as $key => $car)
{{-- {{dd($car)}} --}}
<h1 class="text-light"></h1>



            <div class="d-flex mt-3">
                <div class=" w-50 mx-1 text-center">
                    <img class="rounded-circle w-100" src="{{asset("images/productos/$car->image")}}" alt="image">
                    <a href="deleteProduct/{{$key}}" class="mt-3 fs-4">{{__('car.a')}}</a>
               </div>
                <div class="d-flex mx-2">
                    <div class="info-prod d-flex flex-column justify-content-around p-2">
                        <p >{{$car->name}}</p>
                        <div class="precio">
                            <p>{{$car->price}}€</p>
                        </div>
                        <a >ref: FITHABIT035</a>
                    </div>
                </div>

            </div>

            <hr class="hr">

            @endforeach


            <div class="payment d-flex justify-content-between">

                <div>
                    <h3 class="mt-2">{{__('car.h3')}}</h3>
                    <h3 class="mt-3">{{__('car.h3_2')}}</h3>
                    <h3 class="mt-3 mb-2">{{__('car.h3_3')}}</h3>
                </div>
                <div>
                    <h3 class="prices mt-2">
                        <script>

                            var precios = document.getElementsByClassName("precio");
                            var preciosNumeros = [];
                            var h3Precio = document.getElementsByClassName("prices");
                            var suma = 0;
                            for (p of precios) {
                                    // console.log(p.textContent)
                                    var num = parseFloat(p.textContent);
                                    preciosNumeros.push(num);
                                    suma += num;
                                console.log("suma final ->"+ suma)
                                h3Precio[0].innerHTML = suma;
                            }

                            // console.log(precios);

                            </script>€
                    </h3>
                    <h3 class="prices mt-3">

                        <script>
                            var iva = suma * 0.21;
                            console.log("IVA final ->"+ iva);
                            h3Precio[1].innerHTML = iva;

                            </script>€
                    </h3>
                    <h3 class="prices mt-3 mb-2">0.00€</h3>
                </div>
            </div>

<hr class="hr">




            <div class="d-flex justify-content-between">
                    <div>
                        <h1>{{__('car.h1')}}</h1>
                    </div>
                    <div>
                        {{-- <h3 id="finalPrice"> --}}
                            <form action="{{route("orden.index")}}" method="GET">
                                @csrf
                         <input id="finalPrice" name="finalPrice" class="inputPrecios" value="" type="text" readonly>
                         <script>
                                let final = document.getElementById('finalPrice');
                                let precioFinal = iva + suma;
                                precioFinal = precioFinal.toFixed(2)
                                console.log("final ->"+ precioFinal);
                                final.value = precioFinal;

                                // console.log(precios);

                                </script> <span id="euro">€</span>

                        {{-- </h3> --}}
                    </div>
            </div>


            <div class="mt-3 d-flex flex-column justify-content-center align-items-center">
                <div class=" w-100 mt-2 ">

                    <button style="outline: none;" class="bg-custom w-100 rounded-3 text-light">
                        {{__('car.button')}}
                    </button>
                    </form>
                </div>
            </div>

        </section>

        @else


        <h1 class="text-center text-light">Mi carrito</h1>
    </div>

    <section class="bg-customBody text-light rounded-top-5 p-4">
        <div class="d-flex justify-content-between">
            <div class="text-light h-2 fw-bolder">
                <!-- equis -->
                <span id ="equis" onclick="cerrarCarrito()" class="click">X</span>
            </div>
            <div class="text-light">
                <!-- Articulos y numero -->
                <h2>{{__('car.title')}}:0 </h2>
            </div>
        </div>
<!--PRODUCTOS  -->

<h1 class="text-light"></h1>


        <div class="payment d-flex justify-content-between">

            <div>
                <h3 class="mt-2">{{__('car.h3')}}</h3>
                <h3 class="mt-3">{{__('car.h3_2')}}</h3>
                <h3 class="mt-3 mb-2">{{__('car.h3_3')}}</h3>
            </div>
            <div>
                <h3 class="prices mt-2">
                    0.00€
                </h3>
                <h3 class="prices mt-3">
                    0.00€
                </h3>
                <h3 class="prices mt-3 mb-2">0.00€</h3>
            </div>
        </div>

<hr class="hr">

        <div class="d-flex justify-content-between">
                <div>
                    <h1>{{__('car.h1')}}</h1>
                </div>
                <div>
                    <h3 id="finalPrice">
                      0.00€

                    </h3>
                </div>
        </div>

        <div class="mt-3 d-flex flex-column justify-content-center align-items-center">
            <div class="w-100 ">
                <button class="border-custom w-100 bg-transparent text-light rounded-3">SEGUIR COMPRANDO</button>
            </div>
            <div class=" w-100 mt-2 ">
               <button class="bg-custom w-100 rounded-3 text-light" disabled>
                {{__('car.button')}}
                </button>
            </div>
        </div>

    </section>


        @endif
