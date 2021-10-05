<div class="modal fade" id="modalEditClub">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-edit"></span> 
                        Editar Club
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input class="d-none" id="modalEditid" name="id" />
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="modalEditname" type="text" placeholder="Nombre del Club" class="form-control" name="name" autofocus required >
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('rif') ? ' has-error' : '' }}">
                        <input id="modalEditrif" type="text" placeholder="Rif del Club" class="form-control" name="rif" autofocus required >
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

                    <div class="form-group{{ $errors->has('mision') ? ' has-error' : '' }}">
                        <textarea id="modalEditmision" name="mision" cols="30" rows="10"></textarea>
                        @if ($errors->has('mision'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mision') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
                        <textarea id="modalEdithistory" name="history" cols="30" rows="10"></textarea>
                        @if ($errors->has('history'))
                        <span class="help-block">
                            <strong>{{ $errors->first('history') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                    <div class="form-group{{ $errors->has('stadium_id') ? ' has-error' : '' }}">
                        <select id="modalEditstadium_id" class='form-control' name="stadium_id" size='1'>
                            <option value="0">Estadios</option>
                            @foreach($stadium as $item)
                            <option value="{{$item->id}}">{{$item->id}} - {{$item->name}}</option>
                            @endforeach 
                        </select>
                    </div>

                    {{-- Redes sociales --}}
                   {{--  <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                        <input id="modalEditfacebook" type="text" placeholder="Facebook" class="form-control" name="facebook" autofocus required >
                        @if ($errors->has('facebook'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                        <input value=' id="modalEdittwitter" type="text" placeholder="Twitter" class="form-control" name="twitter" autofocus required >
                        @if ($errors->has('twitter'))
                        <span class="help-block">
                            <strong>{{ $errors->first('twitter') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                        <input value=' id="modalEditinstagram" type="text" placeholder="Instagram" class="form-control" name="instagram" autofocus required >
                        @if ($errors->has('instagram'))
                        <span class="help-block">
                            <strong>{{ $errors->first('instagram') }}</strong>
                        </span>
                        @endif
                    </div> --}}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="modalEditemail" type="email" placeholder="E-mail" class="form-control" name="email" autofocus required >
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phoen_number') ? ' has-error' : '' }}">
                        <input id="modalEditphone_number" type="text" placeholder="Numero de telefono" class="form-control" name="phone_number" autofocus required >
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
                             <a id='btnEdit' class="btn btn-primary btn-block btn-flat">Editar</a>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>