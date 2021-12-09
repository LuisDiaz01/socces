@extends('Landing.layouts.app')
@section('title','Divisiones')
@section('content')

<!-- portfolio_image_area  -->
<div class="portfolio_image_area">
    @forelse($division as $row)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_title text-center mt-30">
                    <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">División {{ $row->division }}
                        <hr style="background-color:rgb(129,75,204);width:2em;margin-top:0px;padding-top:0px">
                    
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card card-stats">
                    <div class="card-body table-responsive">
                        <table class="table align-items-center table-hover table-striped table-hover table-flush">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre y Apellido</th>
                                    <th scope="col">Goles</th>
                                    <th scope="col">Asistensias</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($template as $item)
                            @if($row->id == $item->division_id)
                            <tr id='{{$item->id}}'>
                                <input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>

                                <td id='td_Name{{$item->id}}'>
                                    <label id='labelName{{$item->id}}'>{{$item->Athlete->name}} {{ $item->Athlete->lastname }}</label>
                                </td>
                                <td>
                                    <label id='labelGol{{$item->id}}'>{{$item->Athlete->goles}}</label>
                                </td>
                                <td>
                                    <label id='labelAsistencias{{$item->id}}'>{{$item->Athlete->attendances}}</label>
                                </td>
                            </tr>
                            @endif
                            @empty
                            <tr>
                              <td>
                                <font class='center'>No existen registros</font>
                              </td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    @empty
    @endforelse
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