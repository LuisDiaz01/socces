<div class="modal fade" id="createAthlete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col">
          <h3><span class="fa fa-plus"></span> 
            Agregar un Atleta nuevo
          </h3>
        </div>
        <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{ route('Athlete.store') }}">
          @csrf
          <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
            <label>Cedula</label>
            <input id="dni_input" name="dni" type="number" placeholder="Cedula del Atleta" class="form-control" autofocus required>
            @if ($errors->has('dni'))
            <span class="help-block">
              <strong>{{ $errors->first('dni') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label>Nombre</label>
            <input id="name_input" name="name" type="text" placeholder="Nombre" class="form-control" autofocus required>
            @if ($errors->has('name'))
            <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
            <label>Apellido</label>
            <input id="lastname_input" name="lastname" type="text" placeholder="Apellido" class="form-control" autofocus required>
            @if ($errors->has('lastname'))
            <span class="help-block">
              <strong>{{ $errors->first('lastname') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label>E-mail</label>
            <input id="email_input" name="email" type="email" placeholder="Apellido" class="form-control" autofocus required>
            @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('date_n') ? ' has-error' : '' }}">
            <label>Fecha de Nacimiento</label>
            <input id="date_n_input" name="date_n" type="date" placeholder="Apellido" class="form-control" autofocus required>
            @if ($errors->has('date_n'))
            <span class="help-block">
              <strong>{{ $errors->first('date_n') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('goles') ? ' has-error' : '' }}">
            <label>Goles</label>
            <input id="goles_input" name="goles" type="number" value='0' placeholder="Apellido" class="form-control" autofocus required>
            @if ($errors->has('goles'))
            <span class="help-block">
              <strong>{{ $errors->first('goles') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('attendances') ? ' has-error' : '' }}">
            <label>Asistencias</label>
            <input id="attendance_input" name="attendances" type="number" value="0" placeholder="Apellido" class="form-control" autofocus required>
            @if ($errors->has('attendances'))
            <span class="help-block">
              <strong>{{ $errors->first('attendances') }}</strong>
            </span>
            @endif
          </div>


      </div>
      <div class="modal-footer"> 
        <div class='container'>
          <div class="row">        
            <div class="col-12">
              <button class="btn btn-primary btn-block btn-flat">Registrar</button>
              </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>