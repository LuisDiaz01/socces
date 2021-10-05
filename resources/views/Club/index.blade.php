@extends('layouts.appDashboard')
@section('title','Club')
@section('nameTitleTemplate','Club')
@section('modales')
@include('layouts.modales.Club.modalCreateClub')
@include('layouts.modales.Club.modalEditClub') 
{{-- 
@include('layouts.modales.Areas.modalShowArea')
--}}
@endsection
@section('js')
<script>
  function edit(id){
    $("#modalEditid").val(id);
    $("#modalEditimage").val($('#imagen'+id).val());
    $("#modalEditname").val($('#name'+id).val());
    $("#modalEditrif").val($('#rif'+id).val());
    $("#modalEditaddress").val($('#address'+id).val());
    $("#modalEditmision").val($('#mision'+id).val());
    $("#modalEdithistory").val($('#history'+id).val());
    $("#modalEditstadium_id").val($('#stadium_id'+id).val());
    $("#modalEditfacebook").val($('#facebook'+id).val());
    $("#modalEdittwitter").val($('#twitter'+id).val());
    $("#modalEditinstagram").val($('#instagram'+id).val());
    $("#modalEditemail").val($('#email'+id).val());
    $("#modalEditphone_number").val($('#phone_number'+id).val());
  }
  $('#btnEdit').click(function(){
    var id=$('#modalEditid');
    $.ajax({
      type: "PUT",
      url: APP_URL+"/Club/"+id.val(),
      dataType: "json",
      data:{
        '_token': $('input[name=_token]').val(),
        'name':$("#modalEditname").val(),
        'rif':$("#modalEditrif").val(),
        'address':$("#modalEditaddress").val(),
        'mision':$("#modalEditmision").val(),
        'history':$("#modalEdithistory").val(),
        'stadium_id':$("#modalEditstadium_id").val(),
        'email':$("#modalEditemail").val(),
        'phone_number': $("#modalEditphone_number").val()
      },
      success: function(response){
        location.reload(true);
      }
    });
  });

</script>
@endsection
@section('headerContent')
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-3 col-lg-3 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h5 font-weight-bold">Crear Club</span>
            </div>
            <div class="col-auto">
              <a href="#" data-target='#createClub' data-toggle='modal' title data-original-title="Agregar Club" class='text-white'>
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
              <th scope="col">Rif</th>
              <th scope="col">Dirección</th>
              <th scope="col">Nombre</th>
              <th scope="col">E-mail</th>
              <th scope="col">Numero de Telefono</th>
              <th scope="col">Estadio</th>
              <th scope="col">Created_at</th>
              <th scope="col">Updated_at</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($club as $item)
            <tr id='{{$item->id}}'>
              <td>
                <input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>
                <input class="d-none" id='history{{$item->id}}' value='{{$item->history}}'>
                <input class="d-none" id='mision{{$item->id}}' value='{{$item->mision}}'>
                <input class="d-none" id='image{{$item->id}}' value='{{$item->image}}'>
                {{ $item->id }}
              </td>

              <td id='td_Rif{{$item->id}}'>
                <label id='labelRif{{$item->id}}'>{{$item->rif}}</label>
                <input class='d-none' id="rif{{$item->id}}" value="{{$item->rif }}">
              </td>
              <td id='td_Address{{$item->id}}'>
                <label id='labelAddress{{$item->id}}'>{{$item->address}}</label>
                <input class='d-none' id="address{{$item->id}}" value="{{$item->address }}">
              </td>
              <td id='td_Name{{$item->id}}'>
                <label id='labelName{{$item->id}}'>{{$item->name}}</label>
                <input class='d-none' id="name{{$item->id}}" value="{{$item->name}}">
              </td>
              <td id='td_Email{{$item->id}}'>
                <label id='labelEmail{{$item->id}}'>{{$item->email}}</label>
                <input class='d-none' id="email{{$item->id}}" value="{{$item->email}}">
              </td>
              <td id='td_PhoneNumber{{$item->id}}'>
                <label id="labelPhone_number{{$item->id}}">{{$item->phone_number}}</label>
                <input class="d-none" value="{{$item->phone_number}}" id='phone_number{{$item->id}}'>
              </td>
              <td id='td_stadium_id{{$item->id}}'>
                <label id="labelStadium{{$item->id}}">{{$item->Stadia->name }}</label>
                <input class="d-none" value="{{$item->Stadia->id}}" id='stadium_id{{$item->id}}'>
              </td>
              
              <td id='td_Create{{$item->id}}'>{{ $item->created_at }}</td>
              <td id='td_Edit{{$item->id}}'>{{ $item->updated_at }}</td>
              
              <td>

                <a class="btn-danger btn-icons btn-rounded btn" onclick="deletes('{{$item->id}}','/Club/')" title="Borrar Club" href="#"><i class="fa fa-remove"></i></a>

                <a class="btn-info btn-icons btn-rounded btn" title="Editar Club" data-target='#modalEditClub' data-toggle='modal'  id="btn-1_{{$item->id}}" onclick="edit({{$item->id}})" href="#!"><i class="fa fa-edit"></i></a>
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