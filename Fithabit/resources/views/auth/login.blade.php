
@extends('layout.masterpage')

@section('contenido')
<link rel="stylesheet" href="{{asset("css/login.css")}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&display=swap" rel="stylesheet">


<body id="fondoLogin">

    <div id="registroLogo">
        <img id="ftLogoInicio" src="{{asset("images/unai/FitHabitLogoWhite.png")}}">
    </div>


            <form method="POST" action="{{ route('login') }}" class="formInicio">
                @csrf
              <div class="cajaText_labelInicio">
                <label for="" class="label">Correo electrónico</label>
                <input type="email" class="inputLogin @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              </div>
              <div class="cajaText_labelInicio">
                <label for="" class="label">Contraseña</label>
                <input type="password" class="inputLogin @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
              </div>
              @if(session('error'))
              <div class="alert alert-danger" role="alert">
                  {{ session('error') }}
              </div>
          @endif
          <div class="cajaText_labelInicio">
           @if(Route::has('password.request'))
                                    <a class="olvContraseña" href="{{ route('password.request') }}">
                                        ¿Has olvidado tu contraseña?
                                    </a>
                                @endif
            </div>
              <div id="cajaBtnInicio">
                <button type="submit" class="btnLogin" style="outline: none;">Inicar Sesión</button>
              </div>
              <p class="lnkRegistro">¿No estás dado de alta? <a class="verdeIncioSesion" href="{{route("planes.index")}}"> &nbsp ¡Date de alta ahora aquí!</a></p>

            </form>



</body>

{{--

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
</div>
@endsection
