<?php  
	headerAdmin($data['info']); 
	getModal('modalEditClient', $data);
?>
<script>
	let client_data = null
</script>


<main class="app-content">
  
  <div class="app-title">
    <div>
      <h1>
      	<i class="fas fa-users"></i> 
      	<?php echo $data['info']->page_tag ?> 
      </h1>
      <p><?php echo $data['info']->page_subtitle ?></p>
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
	        <div class="tile-body">
	          <div class="table-responsive">
	            <table class="table table-hover table-bordered" id="sampleTable">
	              <thead>
	                <tr>
	                  <th>Nombre</th>
	                  <th>Apellidos</th>
	                  <th>Telefono</th>
	                  <th>Idcode</th>
	                  <th>Estado de la deuda</th>
	                  <th>Inicio de la deuda</th>
	                  <th>Opciones</th>
	                </tr>
	              </thead>
	              <tbody>
	              	
	              	<?php 

	              		$client_data = [];
	              		$client_data_json = NULL;

	              		foreach ($data['clients'] as $client) { 
	              		
		                    $client_data['name'] = $client['name'];
		                    $client_data['full_name'] = $client['full_name'];
		                    $client_data['phone'] = $client['phone'];

		                    $client_data_json = json_encode($client_data);
		                    
	              	?>
	              	
	                <tr>
	                  <td><?= ucwords($client['name']) ?></td>
	                  <td><?= $client['full_name'] ?></td>
	                  <td><?= $client['phone'] ?></td>
	                  <td><?= $client['id_customer'] ?></td>
	                  <td><?= $client['payment_status'] ?></td>
	                  <td><?= date('d/m/Y H:i:s', strtotime($client['start_month'])) ?></td>
	                  <td>
	                  	<a class="btn btn-primary" href="<?= base_url() ?>/client/code/<?= $client['id_customer'] ?>">Ver</a>
                  		<button class="btn btn-warning" onclick='openModal("modalEditClient", <?php echo $client_data_json ?>)'>Editar</button>
                  		<button class="btn btn-danger" onclick="deleteClient('<?= $client['id_customer'] ?>')">Eliminar</button>
	                  </td>
	                </tr>

	            	<?php 
	            			 
	            		}
	            	?>
	                
	              </tbody>
	            </table>
	          </div>
	        </div>
      	</div>
    </div>
  </div>

</main>



<?php footerAdmin($data); ?>  

<!-- DataTable plugin-->
<script type="text/javascript" src="<?php echo media() ?>/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo media() ?>/js/plugins/dataTables.bootstrap.min.js"></script>

<!-- Sweet alert -->
<script type="text/javascript" src="<?php echo media() ?>/js/plugins/sweetalert.min.js"></script>

<!-- functions.js -->
<script src="<?php echo media() ?>/js/functions.js"></script> 

<script>
	setOptionsDataTables({
		pageLength: 8,
    	lengthMenu: [[8, 16, 24, -1], [8, 16, 24, 'Todos']]
	}) //-> Set options data tables
</script>

