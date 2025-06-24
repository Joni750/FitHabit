@extends('layout.masterpage')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/legalInformation.css') }}">
<body id="fondo">
    <div class="container">
    <section class="estilosSeciones">
        <h1 class="titulos">{{__('legal.title')}} </h1>
        <p class="parrafos">{{__('legal.p1')}}<p>

            <p class="parrafos">{{__('legal.p2')}}</p>

            <p class="parrafos">{{__('legal.p3')}}</p>

            <p class="parrafos">{{__('legal.p4')}}</p>
<ul class="listas">
           <li> {{__('legal.p5')}}</li>

          <li>  {{__('legal.p6')}}</li>

            <li>{{__('legal.p7')}}</li>
        </ul>
        <p class="parrafos">
            {{__('legal.p8')}}

            <p class="parrafos">{{__('legal.p9')}}</p>

           <p class="parrafos"> {{__('legal.p10')}}</p>
<ul class="listas">

            <li> {{__('legal.p11')}} FitHabit</li>

            <li> {{__('legal.p12')}} FitHabit</li>

            <li> {{__('legal.p13')}} F-9286748</li>

            <li> {{__('legal.p14')}} fithabitgym@gmail.com</li>

            <li> {{__('legal.p15')}}</li>
        </ul>
           <p class="parrafos">  {{__('legal.p16')}}</p>
    </section>
    <section class="estilosSeciones">
        <h1 class="titulos">{{__('legal.title2')}} </h1>
        <p class="parrafos">{{__('legal.p17')}}</p>
            <ul class="listas">
           <li>{{__('legal.p18')}}</li>

            <li> {{__('legal.p19')}}</li>

            <li>  {{__('legal.p20')}}</li>

            <li> {{__('legal.p21')}}</li>
    </section>
    <section class="estilosSeciones">
        <h1 class="titulos">{{__('legal.title3')}}
        </h1>
        <p class="parrafos">{{__('legal.p22')}}</p>
            <ul class="listas">
            <li> {{__('legal.p23')}}</li>

            <li> {{__('legal.p24')}} </li>

            <li> {{__('legal.p25')}} </li>

            <li> {{__('legal.p26')}} </li>

            <li> {{__('legal.p27')}} </li>
</ul>
            <p class="parrafos">{{__('legal.p28')}}</p>

            <p class="parrafos">{{__('legal.p29')}}</p>
<ul class="listas">
            <li> {{__('legal.p30')}}</li>

            <li> {{__('legal.p31')}}</li>

            <li> {{__('legal.p32')}}</li>

            <p class="parrafos">{{__('legal.p33')}}</p>

            <p class="parrafos">{{__('legal.p34')}}</p>
        </ul>
    </section>
</div>
</body>

@endsection

