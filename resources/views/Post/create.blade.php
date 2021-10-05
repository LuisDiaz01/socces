@extends('layouts.appDashboard')
@section('title','Publicación')
@section('nameTitleTemplate','Crear Publicación')
@section('modales')
@include('layouts.modales.Type.modalCreateCategory')
@endsection
@section('js')
<script>
 $('textarea').wysihtml5({
    toolbar: { fa: true }
  });

  $(document).ready(function(){
    var div= $('#div_category');
    div.html('<select id="type_id" class="form-control" value="0" name="type_id" size="1"><option value="0">Categoria</option>');
    loadCategory();
  });

  function loadCategory(){
    /*var select= $('#category_id');*/
    var div= $('#type_id');
    var html='<option value="0">Categoria</option>';
    $.ajax({
      type:'GET',
      url:APP_URL+'/api/Type_all',
      success: function(response){
        for (var i = response.length - 1; i >= 0; i--) {
          html= html + '<option value="'+ response[i].id +'">'+ response[i].name +'</option>';
        }
        div.html(html);
      }
    });
  }


  function createCategory(){
    var name= $('#modal_category');
    var div= $('#category_id');
    $.ajax({
      type:'POST',
      url:APP_URL+'/Type',
      data:{
        '_token': $('input[name=_token]').val(),
        'name':name.val(),
      },
      success: function(response){
        var html= html + '<option value="'+ response.id +'">'+ response.name +'</option>';
        div.append(html);
        btn_create_category.click();
        alert('response');
      }
    });
  }

</script>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12 grid-margin">
    <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-header">
          <h1 class="card-title">Crear Publicación</h1>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('Post.store')}}">
                      @csrf
                      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                          <input id="name" type="text" placeholder="Nombre del Post" class="form-control" name="title" autofocus required >
                          @if ($errors->has('title'))
                          <span class="help-block">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                          @endif
                      </div>
                      {{-- descripcion --}}
                      <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                          <textarea name="content" id="content" class="form-control" cols="20" rows="5"  autofocus required placeholder="Contenido del post"></textarea>
                          @if ($errors->has('content'))
                          <span class="help-block">
                              <strong>{{ $errors->first('content') }}</strong>
                          </span>
                          @endif
                      </div>
                     
                      <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                          <div id="div_category"></div>
                          <a href="#" class="btn btn-sm btn-success" data-target='#createCategory' data-toggle='modal' title="Crear una Categoria"><i class="fa fa-plus"></i> </a>
                      </div>

                      <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <input type='file' id="image" name="image[]" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"></label>
                        @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                    </div>
        </div>
        <div class="card-footer">
            <button title="Crear" class="btn btn-primary">Crear</button>
                    </form>
        </div>
      </div>
  </div>
</div>
@endsection