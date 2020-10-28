<?php 
  headerAdmin($data['info']);
  //getModal('modalDetailsClient', $data['client']);
  $curr = 'EUR';
?>


<main class="app-content">
  
  <div class="app-title">
    
    <div>
      <h1>
        <i class="fas fa-user"></i> &nbsp;
        <?= ucwords($data['client']['customer'][0]['name']) ?> 
        &nbsp;[ <?= $data['client']['customer'][0]['id_customer']  ?> ]
      </h1>
      <p><?php echo $data['info']->page_subtitle ?></p>
    </div>

    <ul class="app-breadcrumb breadcrumb">
        
      <?php  
        $temp = $data['client']['customer'][0]['payment_status'];
        if($temp == 'pending'){
          $payment_status = 'Pendiente';
        }else if($temp == 'solved'){
          $payment_status = 'Solventada';
        }else if($temp == 'initial'){
          $payment_status = 'Inicial';
        }
      ?>
      
      <li class="breadcrumb-item">Fecha de inicio: <b> &nbsp; <?= ucwords(strftime("%B %Y", strtotime($data['client']['customer'][0]['start_month']))) ?></b></li>
      
      <?php  

		if($payment_status == 'Inicial'){
			$css_state = 'initial_state';
		}else if($payment_status == 'Solventada'){
			$css_state = 'solved_state';
		}else if($payment_status == 'Pendiente'){
			$css_state = 'pending_state';
		}
      ?>

      <li class="breadcrumb-item">Estado de la deuda: &nbsp; <b class="<?= $css_state ?>"><?= $payment_status ?></b></li>
      
    </ul>

    

  </div>



  

  <div class="row">
    <div class="col-md-12">
    	
      	<div class="tile">
      		
      		<?php //echo dep($data['client']['TOTAL_INFO_HEADER']) ?>

      		<div class="row justify-content-end">
      			<div class="col-md-4"><span class="cp-frame"></span><h5 class="title-table-client">C.pendiente: <?= moneyFormat($data['client']['TOTAL_INFO_HEADER']['outstanding_capital'], $curr) ?></h5></div>
      			<div class="col-md-4"><span class="ip-frame"></span><h5 class="title-table-client">I.total: <?= moneyFormat($data['client']['TOTAL_INFO_HEADER']['pending_interest'], $curr) ?></h5></div>
      			<div class="col-md-3"><span class="ipercent-frame"></span><h5 class="title-table-client">Porcentaje <?= $data['client']['customer'][0]['interest'].'%' ?></h5></div>
      		</div>
      		
	        <div class="tile-body">
	          <div class="table-responsive">
	            <table class="table table-hover table-bordered" id="sampleTable">
	              <thead>
	                <tr>
	                  <th>Fecha</th>
	                 
	                  <th>Interes</th>
	                  <!-- <th>I.acumulado</th> -->
	                  <th>I.pendiente</th>
	                  <th>I.abonado</th>
	                  
	                  <th>C.prestado</th>
	                  <th>C.Abonado</th>
	                  <th>C.abonado total</th>
	                  <th>C.pendiente</th>
	                  <th>T.movimiento</th>
	                </tr>
	              </thead>
	              <tbody>
	                <?php 
	                	foreach ($data['client']['payments'] as $data) { 
	                		//$dete = strftime("%e/%b/%Y", strtotime($data['dete']));
	                		$dete = date('d/m/Y H:i:s', strtotime($data['dete']));
		                    $outstanding_capital = moneyFormat($data['outstanding_capital'], $curr);
		                    $paid_capital = moneyFormat($data['paid_capital'], $curr);
		                    $interest = moneyFormat($data['interest'], $curr);
		                    $accrued_interest = moneyFormat($data['accrued_interest'], $curr);
		                    $interest_paid = moneyFormat($data['interest_paid'], $curr);
		                    $pending_interest = moneyFormat($data['pending_interest'], $curr);
		                    $increased_debt = moneyFormat($data['increased_debt'], $curr);
		                    $payment_month = moneyFormat($data['payment_month'], $curr);
		                    $type_text_transaction = $data['type_transaction'];

		                    if($type_text_transaction == 'charge'){
		                    	$type_text_transaction = 'Abono';
		                    	$type_class_transaction = 'type-text-transaction-charge';
		                    }else if($type_text_transaction == 'borrow'){
		                    	$type_text_transaction = 'Prestamo';
		                    	$type_class_transaction = 'type-text-transaction-borrow';
		                    }else if($type_text_transaction == 'updated'){
		                    	$type_text_transaction = 'Automatico';
		                    	$type_class_transaction = 'type-text-transaction-updated';
		                    }else{
		                    	$type_text_transaction = 'Manual';
		                    	$type_class_transaction = 'type-text-transaction-unespected';
		                    }

	                ?>
	                <tr>
	                  <td><?= $dete ?></td>
	                  <td><?= $interest ?></td>
	                  <!-- <td><?= $accrued_interest ?></td> -->
	                  <td><?= $pending_interest ?></td>
	                  <td><?= $interest_paid ?></td>
	                  <td><?= $paid_capital ?></td>
	                  <td><?= $increased_debt ?></td>
	                  <td><?= $payment_month ?></td>
	                  <td><?= $outstanding_capital ?></td> 
	                  <td class="type-tansaction-td <?= $type_class_transaction ?>"><span><?= $type_text_transaction ?></span></td>
	                </tr>
	            	<?php } ?>
	                
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

<!-- functions.js -->
<script src="<?php echo media() ?>/js/functions.js"></script> 

<script>
	
	setOptionsDataTables({

		pageLength: 9,
    	lengthMenu: [[9, 18, 27, -1], [9, 18, 27, 'Todos']]
	}) //-> Set options data tables

	// /* DATA TABLE CHANGE THE DATE FORMAT */
	// let months = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
	
	// $('#sampleTable tbody tr').on('change', function(){
	// 	let changeDateFormat = $('#sampleTable tbody tr').each(function(i,e) {
	// 	  let dateTD = $(this).find('td:eq(0)')
	// 	  let date = dateTD.text().trim()
	// 	  let parts = date.split('/')
	// 	  dateTD.text(months[parseInt(parts[1])]+' '+parts[2])
	// 	})
	// })

	// let changeDateFormat = $('#sampleTable tbody tr').each(function(i,e) {
	//   let dateTD = $(this).find('td:eq(0)')
	//   let date = dateTD.text().trim()
	//   let parts = date.split('/')
	//   dateTD.text(months[parseInt(parts[1])]+' '+parts[2])
	// })
	

	


</script>