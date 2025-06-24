@extends('layout.masterpage')

@section("estilos")

<link rel="stylesheet" href="{{asset("css/qr.css")}}">

@endsection
@section('contenido')
<h1 class="titulo">{{__('qr.title')}} <br/>{{__('qr.title2')}}</h1>

    <section class="flex-container">
        <div class="caja">
            <p>{{__('qr.text')}}</p>
        </div>
        <div class="caja">
            <div class="visible-print text-center">
                {{-- {{dd(auth()->user()->id)}} --}}
                {{  QrCode::size(180)->generate(Request::user()->id);  }}
            </div>
        </div>
        <div class="caja">
            <img id="logoFitHabit" src="{{asset("/images/unai/FitHabitLogoWhite.png")}}">
        </div>
    </section>
@endsection
