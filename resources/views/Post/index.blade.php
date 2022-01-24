@extends('layouts.appDashboard')
@section('title','Publicaciones')
@section('nameTitleTemplate','Publicaciones')
@section('headerContent')
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-3 col-lg-3 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h5 font-weight-bold">Crear Post</span>
            </div>
            <div class="col-auto">
              <a href="{{ route('Post.create') }}" class='text-white'>
                <div class="btn-icons btn-rounded btn bg-danger text-white shadow">
                  <i class="fa fa-plus text-white"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12 grid-margin">
    <div class="card bg-default shadow">
      <div class="card-body table-responsive">
        <table class="table align-items-center table-hover table-striped table-hover table-flush">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Titulo</th>
              <th scope="col">Contenido</th>
              <th scope="col">Tipo</th>
              <th scope="col">Created_at</th>
              <th scope="col">Updated_at</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($post as $item)
            <tr id='{{$item->id}}'>
              <td>
                <input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>
                {{ $item->id }}
              </td>

              <td id='td_title{{$item->id}}'>
                <label id='labeltitle{{$item->id}}'>{{$item->title}}</label>
                <input class='d-none' id="title{{$item->id}}" value="{{$item->title }}">
              </td>
              <td id='td_content{{$item->id}}'>
                <label id='labelContent{{$item->id}}'>{!!$item->content!!}</label>
                <input class='d-none' id="content{{$item->id}}" value="{{$item->content}}">
              </td>
              <td id='td_type{{$item->id}}'>
                <label id='labelType{{$item->id}}'>{{$item->Type->name}}</label>
                <input class='d-none' id="type{{$item->id}}" value="{{$item->Type->name}}">
              </td>
              
              <td id='td_Create{{$item->id}}'>{{ $item->created_at }}</td>
              <td id='td_Edit{{$item->id}}'>{{ $item->updated_at }}</td>
              
              <td>

                <a class="btn-danger btn-icons btn-rounded btn" onclick="deletes('{{$item->id}}','/Post/')" title="Borrar Post" href="#"><i class="fa fa-remove"></i></a>

                <a class="btn-info btn-icons btn-rounded btn" title="Editar Post" href="{{ route('Post.edit', $item ) }}"><i class="fa fa-edit"></i></a>
              </td>

            </tr>
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
@endsection