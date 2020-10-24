<?php  headerAdmin($data['info']); ?>

<main class="app-content">
  
  <div class="app-title">
    <div>
      <h1><i class="fas fas fa-money-bill-wave"></i> <?php echo $data['info']->page_tag ?> </h1>
      <p><?php echo $data['info']->page_subtitle ?></p>
    </div>
    <!-- <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#"><?php echo $data->page_tag ?></a></li>
    </ul> -->
  </div>

  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="tile">

        <div class="bs-component">
          <div class="tile-body">

            <div class="row justify-content-end" style="height: 25px;">
              
              <div class="col-md-3 mt-2 pt-2 preview-info"></div>
              <div class="col-md-3">
                <ul class="list-unstyled">
                  <li class="app-search">
                    <input class="app-search__input" type="search" id="value-code" placeholder="Buscar el codigo.." style="background-color: #d1e9e7;">
                    <button class="app-search__button" id="search-code"><i class="fa fa-search"></i></button>
                  </li>
                </ul>
                <div class="col-md-11 mt-1 pt-2 preview-info-client"></div>
              </div>


            </div>

            <form id="charge-form">

              

              <!-- HELPER DEP -->
              <?php //echo dep($data) ?>

              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="control-label" for="client">Clientes</label>
                    
                    <select class="form-control" id="client" placeholder="Inserta el nombre..." required>
                    <option value="null">-- Selecciona un cliente --</option>
                    <?php foreach ($data['data']['alldata'] as $client) { ?>
                      <option value="<?=  $client['id_customer'] ?>"><?=  $client['name'] ?></option>
                    <?php } ?>
                    
                    </select>

                  </div>
                </div>
              </div>
              
              <div class="form-group">

                <div class="row">
                  
                  <div class="col-md-3">
                    <label class="control-label" for="mount">Cantidad</label>
                  </div>

                </div>

                <div class="row">
                  
                  <div class="col-md-3">
                    <input type="number" class="form-control" id="mount" step="0.01" style="position: relative; float: left; width: 65%;" required> 
                    <span style="position: relative; float: left; font-size: 25px; margin-left: 5px;">€</span>
                  </div>

                </div>
                
              </div>
              
              <div class="tile-footer">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-fw fa-lg fa-check-circle"></i>
                  Realizar el abono
                </button>
              </div>

            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>

</main>

<?php footerAdmin($data); ?>

<!-- functions.js -->
<script src="<?php echo media() ?>/js/functions.js"></script> 