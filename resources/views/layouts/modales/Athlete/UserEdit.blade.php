<div class="modal fade" id="editUser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col">
          <h3><span class="fa fa-plus"></span> 
            Editar Usuario
          </h3>
        </div>
        <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{ route('User.list.edit') }}">
          @csrf
          <input type="hidden" name="id" id="id_edit_input">
          <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
            <label>Cedula</label>
            <input id="dni_input_edit" name="dni" type="number" placeholder="Cedula del Atleta" class="form-control" autofocus required>
            @if ($errors->has('dni'))
            <span class="help-block">
              <strong>{{ $errors->first('dni') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label>Nombre</label>
            <input id="name_input_edit" name="name" type="text" placeholder="Nombre" class="form-control" autofocus required>
            @if ($errors->has('name'))
            <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
            <label>Apellido</label>
            <input id="lastname_input_edit" name="lastname" type="text" placeholder="Apellido" class="form-control" autofocus required>
            @if ($errors->has('lastname'))
            <span class="help-block">
              <strong>{{ $errors->first('lastname') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label>E-mail</label>
            <input id="email_input_edit" name="email" type="email" placeholder="Apellido" class="form-control" autofocus required>
            @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
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