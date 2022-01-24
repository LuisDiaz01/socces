<div class="modal fade" id="createClub">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3 class="text-center"> 
                        Crear Club
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('Club.store')}}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" placeholder="Nombre Del Estadio" class="form-control" name="name" autofocus required >
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
                             <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>