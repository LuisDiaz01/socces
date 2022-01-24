<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid p-0">
                <div class="row align-items-center no-gutters">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo-img">
                            <a href="index.html">
                                <div style="width:5rem;height:5rem">
                                  <img style="border-radius:50%;width:100%;height:100%" src="{{asset('landing/img/logo_2.jpg')}}" alt="">
                              </div>
                          </a>
                      </div>
                  </div>
                  <div class="col-xl-8 col-lg-8">
                    <div class="main-menu  d-none d-lg-block text-center">
                        <nav>
                            <ul id="navigation">
                                <li><a  href="{{ route('landing.index') }}">Inicio</a></li>
                                <li><a  href="{{ route('landing.template') }}">Plantilla</a></li>
                                <li><a  href="{{ route('landing.encounter') }}">Actividades</a></li>
                                <li><a  href="{{ route('landing.galery') }}">Noticias</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2 d-none d-lg-block">
                    <div class="log_chat_area d-flex align-items-end">
                        <a href="#" data-scroll-nav="0" class="say_hi">{{$club->name}}</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>
<!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-start">
                    <div class="col-lg-10 col-md-10">
                        <div class="slider_text">
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">
                                Bienvenidos a la {{$club->name}}. 
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->