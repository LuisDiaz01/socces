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
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="imageUpload">Logo del Equipo: </label>
                        <input type='file' id="image" name="image[]" required accept=".png, .jpg, .jpeg" />
                        @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" placeholder="Nombre del Club" class="form-control" name="name" autofocus required >
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('rif') ? ' has-error' : '' }}">
                        <input id="rif" type="text" placeholder="Rif del Club" class="form-control" name="rif" autofocus required >
                        @if ($errors->has('rif'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rif') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <input id="address" type="text" placeholder="Dirección del Club" class="form-control" name="address" autofocus required >
                        @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('stadium_id') ? ' has-error' : '' }}">
                        <input id="nameStadium" type="text" placeholder="Nombre del Estadio" class="form-control" name="nameStadium" autofocus required >
                        @if ($errors->has('nameStadium'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nameStadium') }}</strong>
                        </span>
                        @endif
                    </div>

                    <hr>
                    <p class="text-center">CONTACTOS</p>
                    {{-- Redes sociales --}}
                    <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                        <input id="facebook" type="text" placeholder="Facebook" class="form-control" name="facebook" autofocus required >
                        @if ($errors->has('facebook'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                        <input id="twitter" type="text" placeholder="Twitter" class="form-control" name="twitter" autofocus required >
                        @if ($errors->has('twitter'))
                        <span class="help-block">
                            <strong>{{ $errors->first('twitter') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                        <input id="instagram" type="text" placeholder="Instagram" class="form-control" name="instagram" autofocus required >
                        @if ($errors->has('instagram'))
                        <span class="help-block">
                            <strong>{{ $errors->first('instagram') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" placeholder="E-mail" class="form-control" name="email" autofocus required >
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phoen_number') ? ' has-error' : '' }}">
                        <input id="phone_number" type="text" placeholder="Numero de telefono" class="form-control" name="phone_number" autofocus required >
                        @if ($errors->has('phone_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- end redes sociales --}}
                    
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