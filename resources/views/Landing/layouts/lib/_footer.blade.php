<!-- ***** Contact Us Area Start ***** -->
<footer class="footer">
    <div class="footer_top" style="padding-top:2rem">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer_logo wow fadeInRight" style="text-align:center!important;margin-bottom:2rem;padding-bottom:1rem!important;width:10rem;height:10rem;margin:0px auto" data-wow-duration="1s" data-wow-delay=".3s">
                        <a href="#!">
                            <img style="
                                width:100%;
                                height:100%;
                                border-radius:50%;
                                text-align:center;
                                margin:0px auto;
                                position:relative;
                                top:-50%;
                                " 
                                src="{{asset('landing/img/logo_2.jpg')}}" alt="landing/img/logo.jpg">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
            <div class="row" style="margin-bottom:3rem">
                <div class="col-xl-4 col-lg-4 col-md-4 wow fadeInRight">
                    <h3 class="text-center text-white">Pagina</h3>
                    <hr style="background-color:white; width:2em;">
                    <ul class="text-white">
                        <li><a class="text-white" href="{{ route('landing.index') }}">Inicio</a></li>
                        <li><a class='text-white' href="{{ route('landing.template') }}">Plantilla</a></li>
                        <li><a class='text-white' href="{{ route('landing.encounter') }}">Calendario</a></li>
                        <li><a class='text-white' href="{{ route('landing.galery') }}">Noticias</a></li>
                        <li><a class='text-white' href="#">Contactos</a></li>
                    </ul>
                    <hr style="position:absolute;top:-1rem;right:-1%;background:white;background-color:white;height:15em;padding:0px;margin-right:2em;margin:0px;width:.15rem">
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-4 wow fadeInRight">
                    <h3 class="text-center text-white">{{$club->name}}</h3>
                    <hr style="background-color:white; width:2em;">
                    <ul class="text-white">
                        <li>Estadio: {{$club->Stadia->name}}</li>
                        <li>Lugar de entrenamiento: {{$club->Stadia->name}} </li>
                    </ul>
                    <hr style="position:absolute;top:-1rem;right:-1%;background:white;background-color:white;height:15em;padding:0px;margin-right:2em;margin:0px;width:.15rem">
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-4 wow fadeInRight">
                    <h3 class="text-center text-white">Dirección</h3>
                    <hr style="background-color:white; width:2em;">
                    <ul class="text-white">
                        <li>{{ $club->address }}</li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 col-md-12">
                    <div class="socail_links" style="text-align: center!important;">
                        <h4 style="color:white">El club {{$club->name}} en las redes sociales.</h4>
                        <ul>
                            <li><a class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" href="{{$club->Networks->facebook}}"> <i class="fa fa-facebook"></i> </a></li>
                            <li><a class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s" href="{{$club->Networks->twitter}}"> <i class="fa fa-twitter"></i> </a></li>
                            <li><a class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" href="{{$club->Networks->instagram}}"> <i class="fa fa-instagram"></i> </a></li>
                            <li><a class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" href="{{$club->email}}"> <i class="fa fa-google-plus"></i> </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                <a style="color:white;font-size:1.1em"> Aviso legal | Protección de datos | Condiciones de uso | Preguntas frecuentes | Contacto | Ajustes de cookies </a>
                    <p class="copy_right text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.3s">Copyright &copy;{{ now('Y')}}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ***** Footer Area Start ***** -->
