@extends('layout.masterpage')
@section("titulo")
Registro
@endsection
@section('contenido')
<link rel="stylesheet"  href="{{asset("css/register.css")}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&display=swap" rel="stylesheet">
<body id="fondoRegistro">

    <div id="registroLogo">
        <img id="ftLogoRegistro" src="{{asset("images/unai/FitHabitLogoWhite.png")}}">
    </div>

            <form method="POST" action="{{ route('register') }}" class="formRegistro">
            @csrf
            <input type="hidden" name="tipo_suscripcion" value="{{ session('tipo_suscripcion') }}">

              <div class="cajaText_label">
                <label for="name" class="label">Nombre</label>
                <input type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>

              </div>
              @error('name')
              <span class="invalid-feedbackk" role="alert">
                  <strong>El campo nombre es obligatorio.</strong>
              </span>
           @enderror
              <div class="cajaText_label">
                <label for="lastname" class="label">Apellidos</label>
                <input type="text" class="input @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"  autofocus>

              </div>
              @error('lastname')
              <span class="invalid-feedbackk" role="alert">
                  <strong>El campo apellido es obligatorio.</strong>
              </span>
          @enderror
              <div class="cajaText_label">
                <label for="password" class="label">Contraseña</label>
                <input type="password" class="input @error('password') is-invalid @enderror" name="password" >

              </div>
              @error('password')
              <span class="invalid-feedbackk" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
              <div class="cajaText_label">
                            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="input @error('password-confirm') is-invalid @enderror" name="password_confirmation" >


                        </div>
                        @error('password-confirm')
                        <span class="invalid-feedbackk" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              <div class="cajaText_label">
                <label for="dni" class="label">DNI</label>
                <input type="text" class="input @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" >

              </div>

              @error('dni')
                <span class="invalid-feedbackk" role="alert">
                    <strong>El campo DNI se compone de 9 caracteres, los 8 primeros números, y el ultimo una letra.</strong>
                </span>
            @enderror
            @if($errors->has('dni'))
            <span class="invalid-feedback" role="alert">
                <strong>El DNI ya esta registrado.</strong>
            </span>
        @endif
              <div class="cajaText_label">
                <label for="email" class="label">Correo electrónico</label>
                <input type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >

              </div>
              @error('email')
                                    <span class="invalid-feedbackk" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              <div class="cajaText_label">
                <label for="birth_day" class="label">Fecha de nacimiento</label>
                <input type="date" class="input @error('birth_day') is-invalid @enderror" name="birth_day" value="{{ old('birth_day') }}" >

              </div>
              @error('birth_day')
              <span class="invalid-feedbackk" role="alert">
                  <strong>Para poder darte de alta debes tener mínimo 14 años.</strong>
              </span>
          @enderror
              <div class="cajaText_label">
                <label for="sex" class="label">Sexo</label>
                <div class="radio-input">

                            <label>
                            <input type="radio" id="value-1" name="sex" value="Hombre">
                            <span>Hombre</span>
                            </label>
                            <label>
                              <input type="radio" id="value-2" name="sex" value="Mujer">
                            <span>Mujer</span>
                            </label>
                            <label>
                              <input type="radio" id="value-3" name="sex" value="Ns/Nc">
                            <span>Ns/Nc</span>
                            </label>
                            <span class="selection"></span>
                          </div>

              </div>
              @error('sex')
              <span class="invalid-feedbackk" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
              <div id="cajaBtnRegistro">
              <button type="submit" class="btnRegistro" style="outline: none;">Darte de alta</button>
            </div>
            <p class="lnkRegistro">¿Ya estás dado de alta? <a class="verdeIncioSesion" href="{{route("login")}}"> &nbsp ¡Inicia sesión aquí!</a></p>

            </form>

</body>
@endsection
