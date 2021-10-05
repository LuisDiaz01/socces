@extends('Landing.layouts.app')
@section('title', $club->name)
@section('content')

    <!-- portfolio_image_area  -->
    <div class="portfolio_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-90">
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Galeria
                          <hr style="background-color:rgb(129,75,204);width:2em;margin-top:0px;padding-top:0px">
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($post as $keys=>$item)
	                <div class="col-lg-{{ rand(2,6) }} col-md-12">
	                    <div class="single_Portfolio wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
	                        <div class="portfolio_thumb">
	                            <img src="{{ asset('landing/startup/img/slider_'. $keys . '.jpg') }}" alt="{{ 'landing/startup/img/slider_'. $keys . '.jpg' }}">
	                        </div>
	                        <div class="portfolio_hover">
	                            <div class="title">
	                                <a class="boxed-btn3" href="#">{{$item->title }} {{ $keys }}</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                @endforeach
               
            </div>
        </div>
    </div>
    

    <div class="about_area">
      <div class="container">
        <div class="row justify-content-end">
          <div class="col-lg-5 offset-lg-1">
            <div class="about_info">
              <div class="section_title white_text">
                <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                    El Club {{$club->name}} tiene su historia
                </h3>
                <h4 class="wow fadeInUp text-white" style="text-align:center" data-wow-duration="1s" data-wow-delay=".4s">
                <hr style="background-color:white;text-align:left;width:2rem">
                </h4>
                <p class="mid_text wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">{{$club->history}}.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- team_member_start -->
    <div class="team_area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-90">
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Directivos
                        <hr style="background-color:rgb(129,75,204);width:2em;margin-top:0px;padding-top:0px">
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($user as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single_team wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="team_thumb">
                                <img style="width:100%;height:20rem" src="{{asset('landing/startup/img/team/'.rand(1,3).'.png' )}}" alt="">
                                <div class="team_hover">
                                    <div class="hover_inner text-center">
                                        <ul>
                                            <li><a href="{{$item->Network->facebook}}"><i class="fa fa-facebook"></i> </a></li>
                                            <li><a href="{{$item->Network->twitter}}"> <i class="fa fa-twitter"></i> </a></li>
                                            <li><a href="{{$item->Network->instagram}}"> <i class="fa fa-instagram"></i> </a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="team_title text-center">
                                <h3>{{$item->name }} {{$item->lastname }} </h3>
                                <p>{{$item->Rol->rol}}</p>
                            </div>
                        </div>
                    </div>
                @empty   
                @endforelse
            </div>
        </div>
    </div>
    <!--/ team_member_end -->

    <!-- testimonial_area  -->
    <div class="testimonial_area ">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="testmonial_active owl-carousel">
              <div class="single_carousel">
                <div class="single_testmonial text-center">
                  <div class="quote">
                    <img src="{{ asset('/landing/startup/img/testmonial/quote.svg')}}" alt="">
                  </div>
                  <p>{{$club->mision}}</p>
                  <div class="testmonial_author">
                    <h3>{{ $club->name }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection