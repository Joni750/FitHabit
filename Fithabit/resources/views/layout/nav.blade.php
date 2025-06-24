@php

    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use App\Models\Suscription;

    $userSuscription = Suscription::where('user_id', auth()->id())->first();

@endphp

<nav>
    <div class="fndInicio">
        <div class="line-nav">
    <div class="menu-btn" >
      <div class="btn-line"></div>
      <div class="btn-line"></div>
      <div class="btn-line"></div>

    </div>
    <a class="image-container" href="{{ route('usuario.show', (auth()->user() != null) ? auth()->user()->id : '') }}">
        <img src='{{ asset("images/profile.svg") }}'>
    </a></div>
</div>
    <div class="menu">
      <div class="menu-header">
        <div class="close-btn">&times;</div>
      </div>
      <ul>
        <li><a href="{{route("inicio")}}"><img class ="nav-image" src="{{asset("images/logo/LogoH.png")}}"></a></li>

        {{-- Usuarios con suscripcion gratuita sin acceso --}}
        @if ($userSuscription && $userSuscription->suscriptionType->name !== 'gratuita')
            <li><a href="{{route("lista_habitos.index")}}">{{__('nav.habits')}}</a></li>
            <li><a href="{{route("qr.index")}}">QR</a></li>
        @endif
        <li><a href="{{route("restaurante.index")}}">{{__('nav.reservation')}}</a></li>
        <li><a href="{{route("menu.index")}}">{{__('nav.order')}}</a></li>
        <li><a href="{{route("informacion.index")}}">{{__('nav.legal information')}}</a></li>

         <div class = "icons-container">
          <a href="https://www.facebook.com/profile.php?id=61556602700255&locale=es_ES" target="_blank" class="icons"><img src="{{asset("images/logo/fa.svg")}}" ></a>
          <a href="https://www.instagram.com/fithabitoficial/" target="_blank" class="icons"><img src="{{asset("images/logo/insg.svg")}}" ></a>
          <a href="https://twitter.com/FitHabitOficial" target="_blank" class="icons"><img src="{{asset("images/logo/x.svg")}}" ></a>
          <a href="https://www.youtube.com/channel/UCnYH8c5Ct7PZ1zMdQGVbnSw" target="_blank" class="icons"><img src="{{asset("images/logo/yt.svg")}}" ></a>

        </div>

        <div class="languages-container">

        <a href="{{route('setLanguage', 'es')}}">ES</a> |
        <a href="{{route('setLanguage', 'en')}}">EN</a> |
        <a href="{{route('setLanguage', 'eu')}}">EU</a>

        </div>


      </ul>
    </div>
  </nav>
  <script src="{{asset('/js/nav.js')}}"></script>
