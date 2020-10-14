<?php  headerAdmin($data['info']); ?>

<main class="app-content">
  
  <div class="app-title">
    <div>
      <h1><i class="fas fa-hand-holding-usd"></i> <?php echo $data['info']->page_tag ?> </h1>
      <p><?php echo $data['info']->page_subtitle ?></p>
    </div>
    <!-- <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#"><?php echo $data->page_tag ?></a></li>
    </ul> -->
  </div>
  
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="tile">
        <div class="bs-component">
          <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#new"><i class="fas fas fa-plus-circle"></i> Cliente nuevo</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#exists"><i class="fas fa-clipboard-list"></i> Cliente de la lista</a></li>
            <!-- <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li> -->
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
              </div>
            </li> -->
          </ul>
          <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade active show" id="new">
              <div class="col-md-12">
                <div class="tile-body">
                  
                  <form id="new-loan-form" style="padding: 25px 0;">
                    
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label" for="name">Nombre</label>
                          <input type="text" class="form-control" id="name" placeholder="Inserta el nombre...">
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label" for="code">Codigo</label>
                          <input type="text" class="form-control" id="code" placeholder="Codigo de referencia...">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">

                      <div class="row">
                        
                        <div class="col-md-3">
                          <label class="control-label" for="initial_loan">Cantidad</label>
                        </div>
                        <div class="col-md-2">
                          <label class="control-label" for="interst">Interes</label>
                        </div>

                      </div>

                      <div class="row">
                        
                        <div class="col-md-3">
                          <input type="number" class="form-control" id="initial_loan" placeholder="0" style="position: relative; float: left; width: 65%;"  required> 
                          <span style="position: relative; float: left; font-size: 25px; margin-left: 5px;">€</span>
                        </div>

                        <div class="col-md-2">
                          <input type="number" class="form-control" value="10" id="interest" step="0.1" placeholder="10%" style="position: relative; float: left; width: 65%;" required> 
                          <span style="position: relative; float: left; font-size: 25px; margin-left: 5px;">%</span>
                        </div>
                        
                      </div>
                      
                    </div>
                    <div class="tile-footer">
                      <button class="btn btn-primary" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>
                        Realizar el prestamo
                      </button>
                    </div>
                  </form> 
                </div>
              </div> 
              
            </div>
            
            <div class="tab-pane fade" id="exists">
              
              <div class="col-md-12">
                
                <div class="tile-body">


                  <div class="row justify-content-end" style="height: 25px;">
                    <div class="col-md-3">
                      <ul class="list-unstyled">
                        <li class="app-search">
                          <input class="app-search__input" type="search" id="value-code" placeholder="Buscar un cliente..." style="background-color: #d1e9e7;">
                          <button class="app-search__button" id="search-code"><i class="fa fa-search"></i></button>
                        </li>
                      </ul>
                    </div> 
                  </div>

                  <form id="old-loan-form">

                    

                    <!-- HELPER DEP -->
                    <?php //echo dep($data) ?> 
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label" for="client">Clientes</label>
                          
                          <select class="form-control" id="code_exists" placeholder="Inserta el nombre...">
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
                          <label class="control-label" for="initial_loan">Cantidad</label>
                        </div>

                        <div class="col-md-2">
                          <label class="control-label" for="interst">Interes</label>
                        </div>
                      </div>

                      <div class="row">
                        
                        <div class="col-md-3">
                          <input type="number" class="form-control" id="initial_loan_exists" style="position: relative; float: left; width: 65%;"  required> 
                          <span style="position: relative; float: left; font-size: 25px; margin-left: 5px;">€</span>
                        </div>

                        <div class="col-md-2">
                          <input type="number" class="form-control" id="interst_exists" value="10" step="0.1" placeholder="10%" style="position: relative; float: left; width: 65%;" required> 
                          <span style="position: relative; float: left; font-size: 25px; margin-left: 5px;">%</span>
                        </div>
                        
                      </div>
                      
                    </div>
                    <div class="tile-footer">
                      <button class="btn btn-primary" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>
                        Realizar el prestamo
                      </button>
                    </div>
                  </form>
                </div>
                
                

              </div> 

            </div>

            <!-- <div class="tab-pane fade" id="dropdown1">
              <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
            </div>
            <div class="tab-pane fade" id="dropdown2">
              <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
            </div> -->

          </div>
        </div>
      </div>
    </div>
  </div>



</main>



<?php footerAdmin($data); ?>

<!-- functions.js -->
<script src="<?php echo media() ?>/js/functions.js"></script>