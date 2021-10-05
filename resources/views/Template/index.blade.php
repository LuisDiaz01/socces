@extends('layouts.appDashboard')
@section('title','| Plantilla')
@section('nameTitleTemplate','Plantilla')
@section('modales')
@include('layouts.modales.Template.addAtleta')
{{-- 
@include('layouts.modales.Template.Template') 
@include('layouts.modales.Areas.modalShowArea')
--}}
@endsection
@section('header_js')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">

@endsection
@section('js')
<script src="{{  asset('plugins/select2/select2.full.min.js') }}"></script>
<script>
  $('.select2').select2({
    placeholder: 'Atletas',
    cache: true,
    delay: 250,
    minimumInputLength: 1,
    templateResult: formatRepo,
    templateSelection: formatRepoSelection,
    ajax: {
      type:'GET',
      url: APP_URL+"/User/SearchAtleta",
      data: function (params) {
        var query = {
          dni: params.term,
        }

      // Query parameters will be ?search=[term]&type=public
      return query;
    },processResults: function (data, params) {
      return {
        results: data.results,
      };
    }

  }
});

function formatRepo (repo) {
  if (repo.loading) {
    return repo.text;
  }

  var $container = $(
    "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-repository__title'></div>" +
        "<div class='select2-result-repository__description'></div>" +
    "</div>"
  );

  $container.find(".select2-result-repository__title").text(repo.name +' ' + repo.lastname );
  $container.find(".select2-result-repository__description").text(repo.dni);
  
  return $container;
}

function formatRepoSelection (repo) {
  return repo.full_name || repo.text;
}



</script>
{{-- <script>
 /* $('textarea').wysihtml5({
    toolbar: { fa: true }
  });*/
  /*asignacion de datos*/
  function show(id){
    $('#labelArea').html($('#td_Area'+id).html());
    $('#labelAddress').html($('#td_Address'+id).html());
    $('#labelCreate').html($('#td_Create'+id).html());
    $('#labelEdit').html($('#td_Edit'+id).html());
  }

  $('select[name="address_id"]').hover(function(){
    var select=$('select[name="address_id"] option:selected');
    var x=$('#otraAddress');
    if(select.val() == x.val()){
      $('#address').removeClass('d-none');
    }     
  });

  });
</script> --}}
@endsection
@section('content')
<div class="row">
  @forelse($division as $row)
  <div class="col-6 grid-margin">
    <div class="card bg-default shadow">
      <div class="card-header">
        <div class="row">
          <div class="col">
            <h4>{{$row->division}}</h4>
          </div>
          <div class="col">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <span class="h5 font-weight-bold">Agregar Atleta a la Plantilla</span>
                  </div>
                  <div class="col-auto">
                    <a href="#" data-target='#addAtleta' data-toggle='modal' title data-original-title="Agregar Template" class='text-white'>
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
      <div class="card-body table-responsive">
        <table class="table align-items-center table-hover table-striped table-hover table-flush">
          <thead>
            <tr>
              <th scope="col">Cedula</th>
              <th scope="col">Nombre y Apellido</th>
              <th scope="col">E-mail</th>
              <th scope="col">Fecha de Nacimiento</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($template as $item)
            @if($row->id == $item->division_id)
            <tr id='{{$item->id}}'>
              <input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>

              <td id='td_Dni{{$item->id}}'>
                <label id='labelDni{{$item->id}}'>{{$item->Users->dni}}</label>
                <input class='d-none' id="dni{{$item->id}}" value="{{$item->Users->dni}}">
              </td>

              <td id='td_Name{{$item->id}}'>
                <label id='labelName{{$item->id}}'>{{$item->Users->name}} {{ $item->Users->lastname }}</label>
                <input class='d-none' id="name{{$item->id}}" value="{{$item->Users->name}}">
                <input class='d-none' id="lastname{{$item->id}}" value="{{$item->Users->lastname}}">
              </td>
              <td id='td_Email{{$item->id}}'>
                <label id='labelEmail{{$item->id}}'>{{$item->Users->email}}</label>
                <input class='d-none' id="email{{$item->id}}" value="{{$item->Users->email}}">
              </td>

              <td id='td_Create{{$item->id}}'>
                <label id='labelDate_n{{$item->id}}'>{{$item->Users->date_n}}</label>
                <input class='d-none' id="date_n{{$item->id}}" value="{{$item->Users->date_n}}">
              </td>

              <td>

                <a class="btn-danger btn-icons btn-rounded btn" onclick="deletes('{{$item->id}}','/Template/')" title="Borrar Template" href="#"><i class="fa fa-remove"></i></a>

                <a class="btn-info btn-icons btn-rounded btn" title="Editar Template" data-target='#modalEditTemplate' data-toggle='modal'  id="btn-1_{{$item->id}}" onclick="edit({{$item->id}})" href="#!"><i class="fa fa-edit"></i></a>
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
  @empty
  @endforelse
</div>
@endsection