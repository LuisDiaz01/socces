@extends('Landing.layouts.app')
@section('title','Publicaciones')
@section('content')
 <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @forelse($post as $item)
	                        <article class="blog_item">
	                            <div class="blog_item_img">
	                                <img class="card-img rounded-0" src="{{asset($item->img)}}" alt="{{ $item->img }}">
	                                <a href="#" class="blog_item_date">
	                                    <h3>{{ $item->created_at->format('d-m-y') }}</h3>
	                                </a>
	                            </div>

	                            <div class="blog_details">
	                                <a class="d-inline-block" href="single-blog.html">
	                                    <h2>{{$item->title}}</h2>
	                                </a>
	                                <p>{!!$item->content!!}.</p>
	                            </div>
	                        </article>
                        @empty
                        	<div>No hay post</div>
                        @endforelse

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
 								{{ $post->links() }}
							</ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Categoria</h4>
                            <ul class="list cat-list">
                            	@forelse($type as $item)    
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>{{ $item->name }}</p>
                                    </a>
                                </li>
                            	@empty
                            	<li>
                                    <a href="#" class="d-flex">
                                        <p>No hay categorias</p>
                                    </a>
                                </li>
                                @endforelse
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection