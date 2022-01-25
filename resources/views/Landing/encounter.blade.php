@extends('Landing.layouts.app')
@section('title','Actividades')

@section('content')

    <!-- portfolio_image_area  -->
    <div class="portfolio_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-90">
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Encuentros
                          <hr style="background-color:rgb(129,75,204);width:2em;margin-top:0px;padding-top:0px">
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">CASA</th>
                                <th class="text-center">VS</th>
                                <th class="text-center">VISITANTES</th>
                                <th class="text-center bg-info">FECHA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($encounter as $item)
                                @php
                                if (isset( explode('VS', $item->title )[1])) {
                                    $word=explode('VS',$item->title);
                                }elseif (isset(explode('vs',$item->title)[1])) {
                                    $word=explode('vs',$item->title);
                                    
                                }elseif (isset(explode('Vs',$item->title)[1])) {
                                    // code...
                                    $word=explode('Vs',$item->title);
                                }elseif (isset(explode('vS',$item->title)[1])) {
                                    // code...
                                    $word=explode('vS',$item->title);
                                }
                                @endphp
                                <tr>
                                    <td class="text-center">{!! $word[0] !!}</td>
                                    <td class="text-center">vs</td>
                                    <td class="text-center">{!! $word[1] !!}</td>
                                    <td class="text-center bg-info">{{ $item->start }}</td>
                                </tr>
                            @empty
                                <tr><td>NO HAY ENCUENTROS</td></tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

  
    <!-- testimonial_area  -->
    <div class="testimonial_area ">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="testmonial_active owl-carousel">
              <div class="single_carousel">
                <div class="single_testmonial text-center">
                  <div class="quote">
                    <img src="{{ asset('/landing/startup/img/testmonial/quote.svg') }}" alt="">
                  </div>
                  <p>{{$club->mision}}</p>
                  <div class="testmonial_author">
                    <h3>{{ $club->name }}  </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection