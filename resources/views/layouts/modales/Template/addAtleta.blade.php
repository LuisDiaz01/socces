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
                <form class="form-horizontal" method="GET" action="">
                    @csrf
                    {{-- <div class="form-group">
                        <input class="d-none" type="text" id='division_id'>
                        <input id="dni_search" type="text" placeholder="Cedula del Atleta" class="form-control" name="name" autofocus required>
                    </div>
 --}}
                    <input class="d-none" type="text" id='division_id'>

                    <div class="form-group">
                  <label>Multiple</label>
                  <select class="form-control select2" id='dni_search' multiple="multiple" data-placeholder="Select a State"
                          style="width: 100%;">
                    {{-- <option selected="selected">Atletas</option> --}}
                    <option value="3620194" selected="selected">select2/select2</option>
                  </select>
                </div>
                    <div id='search'></div>
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