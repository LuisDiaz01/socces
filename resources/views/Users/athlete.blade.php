@extends('layouts.appDashboard')
@section('title',' Atletas')
@section('nameTitleTemplate','Usuarios')
@section('modales')
@include('layouts.modales.Athlete.CreateAthleteModal')
@include('layouts.modales.Athlete.Edit')
@endsection
@section('js')
  <script type="text/javascript">
    function PasarDatos(id){
      var id=id;
      $('#id_edit_input').val(id);

      $('#dni_input_edit').val( $('#dni'+id).val());
      $('#name_input_edit').val( $('#name'+id).val());
      $('#lastname_input_edit').val( $('#lastname'+id).val());
      $('#email_input_edit').val( $('#email'+id).val());
      $('#goles_input_edit').val( $('#goles'+id).val());
      $('#attendance_input_edit').val( $('#attendances'+id).val());

    }
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
              <span class="h5 font-weight-bold">Crear Atleta</span>
            </div>
            <div class="col-auto">
              <a href="#" data-target='#createAthlete' data-toggle='modal' title data-original-title="Agregar Usuario" class='text-white'>
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
              <th scope="col">Cedula</th>
              <th scope="col">Nombre Y Apellido</th>
              <th scope="col">E-mail</th>
              <th scope="col">Fecha De Nacimiento</th>
              <th scope="col">Goles</th>
              <th scope="col">Asistencias</th>
              <th scope="col">Created_at</th>
              <th scope="col">Updated_at</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($athlete as $item)
            <tr id='{{$item->id}}'>
              <td>
                <input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>
                {{ $item->id }}
              </td>
              <td id='td_dni{{$item->id}}'>
                <label id='labelDni{{$item->id}}'>{{$item->dni}}</label>
                <input class='d-none' id="dni{{$item->id}}" value="{{$item->dni }}">
              </td>
              <td id='td_Name{{$item->id}}'>
                <label id='labelName{{$item->id}}'>{{$item->name}} {{ $item->lastname }}</label>
                <input class='d-none' id="name{{$item->id}}" value="{{$item->name}}">
                <input class='d-none' id="lastname{{$item->id}}" value="{{$item->lastname}}">
              </td>
              <td id='td_Email{{$item->id}}'>
                <label id='labelEmail{{$item->id}}'>{{$item->email}}</label>
                <input class='d-none' id="email{{$item->id}}" value="{{$item->email}}">
              </td>
              <td id='td_date_n{{$item->id}}'>
                <label id="labelDateN{{$item->id}}">{{$item->goles }}</label>
                <input class="d-none" value="{{$item->goles}}" id='gole{{$item->id}}'>
              </td>
              <td id='td_date_n{{$item->id}}'>
                <label id="labelDateN{{$item->id}}">{{$item->attendances }}</label>
                <input class="d-none" value="{{$item->attendances}}" id='attendances{{$item->id}}'>
              </td>

              <td id='td_date_n{{$item->id}}'>
                <label id="labelDateN{{$item->id}}">{{$item->date_n }}</label>
                <input class="d-none" value="{{$item->date_n}}" id='date_n{{$item->id}}'>
              </td>
              
              <td id='td_Create{{$item->id}}'>{{ $item->created_at }}</td>
              <td id='td_Edit{{$item->id}}'>{{ $item->updated_at }}</td>
              <td>
                <a class="btn-danger btn-icons btn-rounded btn" href="{{ route('Delete.athlete', $item) }}" title="Borrar usuario" href="#"><i class="fa fa-remove"></i></a>
                <a class="btn-info btn-icons btn-rounded btn" title="Editar User" data-target='#editAthlete' data-toggle='modal' id='athlete_{{$item->id}}' onclick="PasarDatos({{$item->id}})" href="#!"><i class="fa fa-edit"></i></a>
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
        {{ $athlete->links() }}
      </div>
    </div>
  </div>
</div>
@endsection