<header>
@guest
  <div class="alert" style="position: fixed;width:100%;left:0;top:0;border-radius:0px;height:2.5cm;background-color: rgba(100, 100, 100, .2)">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h3 class="text-white ml-lg-5 ml-xl-5 pl-lg-5 pl-xl-5 offset-md-0 pl-md-0" style="padding-left:30%;padding-top:1rem">Descarga de los contenidos de las Und. Curriculares <a href="#" data-target='#downloadPublic' data-toggle='modal' class="btn btn-sm btn-primary text-white" >Descargar</a></h3>
  </div>
  <div class="container">                                
    <div class="header-body text-center mt-5 mb-1 mb-1 pb-md-5  ">
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12">
          <a href="{{route('home')}}" class="text-white"><p class="text-lead text-white rebel" style="font-size:2cm">{{ config('app.name') }}</p></a>
          <h1 class="text-white">Bienvenido/a!</h1>
        </div>              
      </div>
    </div>
  </div>
  @if (Session::has('messages'))
  {!! Session::get('messages') !!}
  @endif
@endguest
</header>