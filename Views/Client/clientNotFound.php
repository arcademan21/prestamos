<?php  headerAdmin($data); ?>

<main class="app-content">
  
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user"></i> No existen datos </h1>
      <p>Ha ocurrido un error</p>
    </div>
    <!-- <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item">
      	<p>
  			<button class="btn btn-warning icon-btn">
      			<i class="fa fa-edit"></i>
      			Editar	
      		</button>
      		<button class="btn btn-danger icon-btn">
      			<i class="fas fa-user-minus"></i>
      			Eliminar	
      		</button>
      		
      	</p>
      </li>
      <li class="breadcrumb-item"><a href="#"><?php echo $data->page_tag ?></a></li>
    </ul> -->
  </div>

  <div class="row">
  	
  	<div class="col-md-12">
      <div class="tile">
        No hay resultados.
      </div>
    </div>
    
  </div>

  

</main>



<?php footerAdmin($data); ?>  

<!-- functions.js -->
<script src="<?php echo media() ?>/js/functions.js"></script> 

