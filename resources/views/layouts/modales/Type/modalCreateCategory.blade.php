<div class="modal fade" id="createCategory">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-plus"></span> 
                        Crear Categorias
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="modal_category" type="text" placeholder="Nombre de la name" class="form-control" name="name" autofocus required >
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer"> 
                    <div class='container'>
                        <div class="row">        
                            <div class="col-12">
                             <a  class="btn btn-primary btn-block btn-flat" onclick="createCategory()">Agregar</a>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>