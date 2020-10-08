<?php  headerAdmin($data); ?>

<main class="app-content">
  
  <div class="app-title">
    <div>
      <h1><i class="fas fa-hand-holding-usd"></i> <?php echo $data->page_tag ?> </h1>
      <p><?php echo $data->page_subtitle ?></p>
    </div>
    <!-- <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#"><?php echo $data->page_tag ?></a></li>
    </ul> -->
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="tile">
        <div class="tile-body">
        	
        	<form id="new-client-form" style="padding: 25px 0;">
	            
	            <div class="row">
	            	<div class="col-md-12">
			            <div class="form-group">
			              <label class="control-label" for="name">Nombre</label>
			              <input type="text" class="form-control" id="name" placeholder="Inserta el nombre..." required>
			            </div>
			        </div>
			    </div>

			    <div class="row">
	            	<div class="col-md-12">
			            <div class="form-group">
			              <label class="control-label" for="full_name">Apellidos</label>
			              <input type="text" class="form-control" id="full_name" placeholder="Inserta el/los apellidos...">
			            </div>
			        </div>
			    </div>

	            <div class="row">
	            	<div class="col-md-12">
			            <div class="form-group">
			              <label class="control-label" for="phone">Telefono</label>
			              <input type="text" class="form-control" id="phone" placeholder="Inserta el telefono...">
			            </div>
			        </div>
			    </div>
	            
	            <div class="row">
	            	<div class="col-md-6">
	            		<div class="form-group">
			                <label class="control-label" for="code">Codigo</label>
			                <input class="form-control" type="number" id="code" placeholder="Codig de referencia..." required>
			            </div>
	            	</div>
	            </div>
	            
	            <div class="tile-footer">
			        <button class="btn btn-primary" type="submit">
			          <i class="fa fa-fw fa-lg fa-check-circle"></i>
			          Añadir
			        </button>
			    </div>
          	</form> 
      	</div>
      	
      </div>
    </div>
  </div>



</main>

<?php footerAdmin($data); ?>

<!-- functions.js -->
<script src="<?php echo media() ?>/js/functions.js"></script>