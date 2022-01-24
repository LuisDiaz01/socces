<div class="modal fade" id="addAtleta">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-plus"></span> 
                        Cedula del Atleta
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('Template.store') }}">
                  @csrf
                  <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                    <select id="dniInput" name="dniInput" class='form-control' required>
                        <option value=''>Seleccionar una Cedula de un Atleta</option>
                        @foreach($athlete as $item)
                        <option value='{{$item->id}}'>{{$item->name}}{{$item->lastname}} - {{$item->dni}} </option>
                        @endforeach
                    </select>
                    @if ($errors->has('dni'))
                    <span class="help-block">
                      <strong>{{ $errors->first('dni') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group{{ $errors->has('division_id') ? ' has-error' : '' }}">
                    <select class="form-control" name="division_id" id="division_id">
                      <option value="0">Diviciones</option>
                      @foreach($division as $row)
                        <option value="{{$row->id}}">{{$row->division}}</option>
                      @endforeach
                    </select>

                    @if ($errors->has('division_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('division_id') }}</strong>
                    </span>
                    @endif
                  </div>
                  


                <div class="modal-footer"> 
                    <div class='container'>
                        <div class="row">        
                            <div class="col-12">
                               <button type="submit" class="btn btn-primary btn-block btn-flat">Agregar</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>