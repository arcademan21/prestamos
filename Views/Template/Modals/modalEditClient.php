<!-- Modal -->
<div class="modal fade" id="modalEditClient" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <!-- <div class="tile"> -->
          
          <div class="tile-body">
            <form id="formEditUser" name="formEditUser">

              
              
              
              <div class="form-group">
                <label class="control-label" for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Inserta el nombre...">
              </div>

              <div class="form-group">
                <label class="control-label" for="full_name">Apellidos</label>
                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Inserta el/los apellidos...">
              </div>

              <div class="form-group">
                <label class="control-label" for="phone">Telefono</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Inserta el telefono...">
              </div>

              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="control-label" for="code">Codigo</label>
                    <input type="number" class="form-control" name="code" id="code" placeholder="Codigo de referencia...">
                  </div>
                </div>
              </div>



              <div class="tile-footer">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-fw fa-lg fa-check-circle"></i>
                  Guardar
                </button>&nbsp;&nbsp;&nbsp;
                <a class="btn btn-secondary" data-dismiss="modal" href="#">
                  <i class="fa fa-fw fa-lg fa-times-circle"></i>
                  Cancelar
                </a>
              </div>
            </form>
          </div>
          
        </div>

      <!-- </div> -->
      
    </div>
  </div>
</div>