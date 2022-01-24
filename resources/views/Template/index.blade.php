@extends('layouts.appDashboard')
@section('title','Plantilla')
@section('nameTitleTemplate','Plantilla')
@section('modales')
@include('layouts.modales.Athlete.CreateAthleteModal')
@include('layouts.modales.Template.addAtleta')
@endsection
@section('js')
<script>
  
  // (document).ready(function(){

  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('#dniInput').select2();
    });
  });

  // $('select[name="address_id"]').hover(function(){
  //   var select=$('select[name="address_id"] option:selected');
  //   var x=$('#otraAddress');
  //   if(select.val() == x.val()){
  //     $('#address').removeClass('d-none');
  //   }     
  // });

  // });
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
              <span class="h5 font-weight-bold">Agregar un fichaje de un atleta</span>
            </div>
            <div class="col-auto">
              <a href="#" data-target='#addAtleta' data-toggle='modal' title data-original-title="Agregar Atleta" class='text-white'>
                <div class="btn-icons btn-rounded btn bg-danger text-white shadow">
                  <i class="fa fa-plus text-white"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-lg-3 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h5 font-weight-bold">Crear un atleta</span>
            </div>
            <div class="col-auto">
              <a href="#" data-target='#createAthlete' data-toggle='modal' title data-original-title="Agregar Atleta" class='text-white'>
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
  @forelse($division as $row)
  <div class="col-6 grid-margin">
    <div class="card bg-default shadow">
      <div class="card-header">
        <div class="row">
          <div class="col">
            <h4>{{$row->division}}</h4>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table align-items-center table-hover table-striped table-hover table-flush">
          <thead>
            <tr>
              <th scope="col">Nombre y Apellido</th>
              <th scope="col">Cedula</th>
              <th scope="col">E-mail</th>
              <th scope="col">Fecha de Nacimiento</th>
              <th scope="col">Goles</th>
              <th scope="col">Asistencias</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($template as $item)
            @if($row->id == $item->division_id)
            <tr id='{{$item->id}}'>
              <input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>
              <td id='td_Name{{$item->id}}'>
                <label id='labelName{{$item->id}}'>{{$item->Athlete->name}} {{ $item->Athlete->lastname }}</label>
                <input class='d-none' id="name{{$item->id}}" value="{{$item->Athlete->name}}">
                <input class='d-none' id="lastname{{$item->id}}" value="{{$item->Athlete->lastname}}">
              </td>

              <td id='td_Dni{{$item->id}}'>
                <label id='labelDni{{$item->id}}'>{{$item->Athlete->dni}}</label>
                <input class='d-none' id="dni{{$item->id}}" value="{{$item->Athlete->dni}}">
              </td>

              <td id='td_Email{{$item->id}}'>
                <label id='labelEmail{{$item->id}}'>{{$item->Athlete->email}}</label>
                <input class='d-none' id="email{{$item->id}}" value="{{$item->Athlete->email}}">
              </td>
              <td id='td_Create{{$item->id}}'>
                <label id='labelDate_n{{$item->id}}'>{{ $item->Athlete->date_n }}</label>
                <input class='d-none' id="date_n{{$item->id}}" value="{{$item->Athlete->date_n}}">
              </td>

              <td id='td_Goles{{$item->id}}'>
                <label id='labelGoles{{$item->id}}'>{{ $item->Athlete->goles }}</label>
                <input class='d-none' id="goles{{$item->id}}" value="{{$item->Athlete->goles}}">
              </td>
              <td id='td_Attendance{{$item->id}}'>
                <label id='labelAttendance{{$item->id}}'>{{ $item->Athlete->attendances }}</label>
                <input class='d-none' id="attendance{{$item->id}}" value="{{$item->Athlete->attendances}}">
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