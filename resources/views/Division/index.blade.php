@extends('layouts.appDashboard')
@section('title','Diviciones')
@section('nameTitleTemplate','Diviciones')
@section('js')
<script>
  
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
              <span class="h5 font-weight-bold">Crear Divición</span>
            </div>
            <div class="col-auto">
              <a href="#" data-target='#createDivision' data-toggle='modal' title data-original-title="Agregar Divición" class='text-white'>
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
@section('modales')
  @include('layouts.modales.Division.modalCreateDivision')
  {{-- @include('layouts.modales.Division.modalEditArea') --}}
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
              <th scope="col">Divición</th>
              <th scope="col">Created_at</th>
              <th scope="col">Updated_at</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($division as $item)
            <tr id='{{$item->id}}'>
              <td>
                <input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>
                {{ $item->id }}
              </td>

              <td id='td_division{{$item->id}}'>
                <label id="labelDivision{{$item->id}}">{{$item->division }}</label>
                <input class="d-none" value="{{$item->division}}" id='division{{$item->id}}'>
              </td>
              
              <td id='td_Create{{$item->id}}'>{{ $item->created_at }}</td>
              <td id='td_Edit{{$item->id}}'>{{ $item->updated_at }}</td>
              
              <td>

                <a class="btn-danger btn-icons btn-rounded btn" onclick="deletes('{{$item->id}}','/Division/')" title="Borrar Division" href="#"><i class="fa fa-remove"></i></a>

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