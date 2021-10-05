@extends('layouts.appPermission')
@section('title',' Error 404')
@section('content')
<div class="col-lg-7 mx-auto text-white">
  <div class="row align-items-center d-flex flex-row">
    <div class="col-lg-6 text-lg-right pr-lg-4">
      <h1 class="display-1 mb-0">404</h1>
    </div>
    <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
      <h2>Opp lo sentimos!</h2>
      <h3 class="font-weight-light">Permisos no consevidos para este usuario.</h3>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-12 text-center mt-xl-2">
      <a class="text-white font-weight-medium" href="{{ url('/') }}">Regresar al inicio</a>
    </div>
  </div>
  @include('layouts.footer.footerLogin')
</div>
@endsection

