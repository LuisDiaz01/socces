<div class="modal fade" id="createDivision">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-plus"></span> 
                        Crear Divición
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('Division.store')}}">
                    @csrf
                    <div class="form-group{{ $errors->has('division') ? ' has-error' : '' }}">
                        <input id="division" type="text" placeholder="Divición" class="form-control" name="division" autofocus required >
                        @if ($errors->has('division'))
                        <span class="help-block">
                            <strong>{{ $errors->first('division') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer"> 
                    <div class='container'>
                        <div class="row">        
                            <div class="col-12">
                             <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>