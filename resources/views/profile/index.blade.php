@extends('layouts.appDashboard')
@section('title','| Perfil')
@section('nameTitleTemplate','Perfil')
@section('js')
<script type="text/javascript">
  $('#btn-edit-fullname').click(function(){
    $('#h3-fullname').addClass('d-none');
    $('#form-fullname').removeClass('d-none');
    $('#btn-edit-fullname').addClass('d-none');
  });
</script>
@endsection

@section('content')
<div class="row">
  <div class="col-xl-8 col-md-6  mb-4">
    <div class="card bg-secondary shadow">
      <div class="card-header bg-white border-0">
        <div class="row align-items-center">
          <div class="col-lg-8 col-xl-8 col-md-6">
            <h3 class="mb-0">Mi cuenta</h3>
          </div>
          <form action="{{route('profile.upData')}}">
          @csrf
          <div class="col-lg-4 col-xl-4 col-md-6 pt-md-2 text-right">
            <button type='submit' class="btn btn-sm btn-primary">Configurar Contraseña</button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h6 class="heading-small text-muted mb-4">Información</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-email">E-mail</label>
                <input type="email" id="input-email" name='email' class="form-control form-control-alternative" placeholder="{{ Auth::user()->email }}" disabled>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-alfterpass">Contraseña Antigüa</label>
                <input type="password" name="mypassword" id="input-username" class="form-control form-control-alternative" placeholder="*********" value="">
                <div class="text-danger">{{$errors->first('mypassword')}}</div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-password">Nueva Contraseña</label>
                <input type="password" name="password" id="input-username" class="form-control form-control-alternative" placeholder="*********" value="">
                <div class="text-danger">{{$errors->first('password')}}</div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                  <label class="form-control-label" for="input-confirpass">Confirme Nueva Contraseña</label>
                  <input type="password" name="password_confirmation" id="input-username" class="form-control form-control-alternative" placeholder="*********" value="">
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-6  mb-5 mb-xl-0">
    <div class="card card-profile shadow">
      <div class="row justify-content-center">
        <div class="col-lg-3 col-md-3 order-lg-4 pt-2 ml-1">
          <div class="card-profile-image">
            <a href="#">
              <img src="{{ asset('assets/images/user.jpg') }}" class="rounded-circle img-lg">
            </a>
          </div>
        </div>
      </div>
      <div class="card-body pt-0 pt-md-6">
        <div class="row">
          <div class="col">
            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
              <br>
            </div>
          </div>
        </div>
        <div class="text-center">
          <h3 id="h3-fullname">
            {{ Auth::user()->name }} {{ Auth::user()->lastname }}
          </h3>

          <form action="{{route('Users.up_date',Auth::user()->id)}}" id="form-fullname" class="d-none container form-horizontal">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Nombre</label>
                  <input type="text" id="input-first-name" name='name' class="form-control form-control-alternative" placeholder="{{Auth::user()->name}}" value="{{Auth::user()->name}}" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name">Apellido</label>
                  <input type="text" id="input-last-name" name='lastname' required class="form-control form-control-alternative" placeholder="{{Auth::user()->lastname}}" value="{{Auth::user()->lastname}}">
                </div>
              </div>    
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-block btn-success">Editar</button>
              </div>
            </div>
          </form>

          <div class="h3 mt-4 font-weight-300">
            <i class="ni location_pin mr-2"></i>
            @if(Auth::user()->hasRole(1))
              <b>Administrador</b>
            @else
              <b>Otro</b>
            @endif
          </div>
        </div>
        <div class="card-footer">
          <div class="col-lg-12 text-right">
            <a id="btn-edit-fullname" class="text-white btn btn-block btn-sm btn-primary">Editar</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection