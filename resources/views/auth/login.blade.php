@extends('layouts.app')
@section('content')
<style>

  .login-box {
    width: 100%;
    margin: auto;
    max-width: 525px;
    min-height: 670px;
  }

  .login-snip {
    width: 100%;
    height: 100%;
    padding: 5rem 5rem 4rem 3rem;
  }

  .login-snip .login,
  .login-snip .sign-up-form {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    transform: rotateY(180deg);
    backface-visibility: hidden;
    transition: all .4s linear
  }

  .login-snip .sign-in,
  .login-snip .sign-up,
  .login-space .group .check {
    display: none
  }

  .login-snip .tab,
  .login-space .group .label,
  .login-space .group .button {
    text-transform: uppercase
  }

  .login-snip .tab {
    font-size: 22px;
    margin-right: 15px;
    padding-bottom: 5px;
    margin: 0 15px 10px 0;
    display: inline-block;
    border-bottom: 2px solid #ccc;
  }

  .login-snip .sign-in:checked+.tab,
  .login-snip .sign-up:checked+.tab {
    color: #000;
    border-color: #1161ee
  }

  .login-space {
    min-height: 345px;
    position: relative;
    perspective: 1000px;
    transform-style: preserve-3d
  }

  .login-space .group {
    margin-bottom: 15px
  }

  .login-space .group .label,
  .login-space .group .input,
  .login-space .group .button {
    width: 100%;
    color: #ccc;
    display: block
  }

  .login-space .group .input,
  .login-space .group .button {
    border: 2px solid #ccc;
    padding: 15px 20px;
    border-radius: 25px;
    background: rgba(255, 255, 255, .1)
  }

  .login-space .group input[data-type="password"] {
    text-security: circle;
    -webkit-text-security: circle
  }

  .login-space .group .label {
    color: #aaa;
    font-size: 12px
  }

  .login-space .group .button {
    background: #1161ee
  }

  .login-space .group label .icon {
    width: 15px;
    height: 15px;
    border-radius: 2px;
    position: relative;
    display: inline-block;
    background: rgba(255, 255, 255, .1)
  }

  .login-space .group label .icon:before,
  .login-space .group label .icon:after {
    content: '';
    width: 10px;
    height: 2px;
    background: #fff;
    position: absolute;
    transition: all .2s ease-in-out 0s
  }

  .login-space .group label .icon:before {
    left: 3px;
    width: 5px;
    bottom: 6px;
    transform: scale(0) rotate(0)
  }

  .login-space .group label .icon:after {
    top: 6px;
    right: 0;
    transform: scale(0) rotate(0)
  }

  .login-space .group .check:checked+label {
    color: #ccc
  }

  .login-space .group .check:checked+label .icon {
    background: #1161ee
  }

  .login-space .group .check:checked+label .icon:before {
    transform: scale(1) rotate(45deg)
  }

  .login-space .group .check:checked+label .icon:after {
    transform: scale(1) rotate(-45deg)
  }

  .login-snip .sign-in:checked+.tab+.sign-up+.tab+.login-space .login {
    transform: rotate(0)
  }

  .login-snip .sign-up:checked+.tab+.login-space .sign-up-form {
    transform: rotate(0)
  }

  *,
  :after,
  :before {
    box-sizing: border-box
  }

  .clearfix:after,
  .clearfix:before {
    content: '';
    display: table
  }

  .clearfix:after {
    clear: both;
    display: block
  }


  .hr {
    height: 2px;
    margin: 60px 0 50px 0;
    background: rgba(255, 255, 255, .2)
  }

  .foot {
    text-align: center
  }
  ::placeholder {
    color: #b3b3b3
  }
</style>
<div class="col-md-5">
  <img  src="{{asset('img/login-bg.jpg')}}" alt="login" class="login-card-img">
</div>
<div class="col-md-7 mx-auto p-0">
  <div class="card">
    <div class="login-box">
      <div class="login-snip">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
        <label for="tab-1" class="tab">Iniciar Sección</label> 
        <input id="tab-2" type="radio" name="tab" class="sign-up">
        <label for="tab-2" class="tab">Registrarse</label>
        <div class="login-space" >
          <div class="login">
            <br>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="user" class="label">E-mail</label>
                <input id="email" type="email" class="input" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
              <div class="group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="pass" class="label">Contraseña</label> 
                <input id="password" type="password" class="input" placeholder="********" name="password" required>
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
              <div class="group">
                <input id="check" type="checkbox" class="check" checked>
                <label for="check">
                  <span class="icon"></span> Keep me Signed in
                </label>
              </div>
              <div class="group">
               <button type="submit" class="button" style="color: white">Iniciar</button> 
             </div>
             <div class="hr"></div>
             <div class="foot"><a href="#">Forgot Password?</a> </div>
           </form>
         </div>
         <div class="sign-up-form" {{-- style="overflow: auto; width:100%" --}}>
          <br>
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="group{{ $errors->has('dni') ? ' has-error' : '' }}">
              <input id="dni" type="number" placeholder="Cedula" class="input" name="dni" value="{{ old('dni') }}" required autofocus>
              @if ($errors->has('dni'))
              <span class="help-block">
                <strong>{{ $errors->first('dni') }}</strong>
              </span>
              @endif
            </div>
            <div class="group{{ $errors->has('name') ? ' has-error' : '' }}">
              <input id="name" type="text" placeholder="Nombre" class="input" name="name" value="{{ old('name') }}" required autofocus>
              @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>
            <div class="group{{ $errors->has('lastname') ? ' has-error' : '' }}">
              <input id="lastname" type="text" placeholder="Apellido" class="input" name="lastname" value="{{ old('lastname') }}" required autofocus>
              @if ($errors->has('lastname'))
              <span class="help-block">
                <strong>{{ $errors->first('lastname') }}</strong>
              </span>
              @endif
            </div>
            <div class="group{{ $errors->has('email') ? ' has-error' : '' }}">
              <input id="email" type="email" placeholder="E-mail" class="input" name="email" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
            <div class="group{{ $errors->has('password') ? ' has-error' : '' }}">
              <input id="password" placeholder="Contraseña" type="password" class="input" name="password" required>
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
            <div class="group">
              <input id="password-confirm" placeholder="Confirme Contraseña" type="password" class="input" name="password_confirmation" required>
            </div>
            <div class="group">
              <button type="submit" class="button" style="color: white">Crear cuenta</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection