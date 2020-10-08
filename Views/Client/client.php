<?php 
  headerAdmin($data['info']);
  getModal('modalDetailsClient', $data['client']);
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
      <li class="breadcrumb-item">Estado de la deuda: &nbsp; <b><?= $payment_status ?></b></li>

      <!-- <li class="breadcrumb-item"><a href="#"><?php echo $data->page_tag ?></a></li> -->
    </ul>
  </div>

  

  <div class="row">
    <div class="col-md-12">
      	<div class="tile">
      		<?php //echo dep($data['client']['TOTAL_INFO_HEADER']) ?>
      		<div class="row justify-content-center">
      			<div class="col-md-3"><span class="cp-frame"></span><h5 class="title-table-client">C.pendiente: <?= money_format('%i', $data['client']['TOTAL_INFO_HEADER']['outstanding_capital']) ?></h5></div>
      			<div class="col-md-3"><span class="ip-frame"></span><h5 class="title-table-client">I.pendiente: <?= money_format('%i', $data['client']['TOTAL_INFO_HEADER']['pending_interest']) ?></h5></div>
      		</div>
      		
      		
	        <div class="tile-body">
	          <div class="table-responsive">
	            <table class="table table-hover table-bordered" id="sampleTable">
	              <thead>
	                <tr>
	                  <th>Fecha</th>
	                  <th>Ab.mes</th>
	                  <th>I.abonado</th>
	                  <th>C.abonado</th>
	                  <th>I.pendiente</th>
	                  <th>C.pendiente</th>
	   				  <th>Interes</th>
	   				  <th>I.acumulado</th>
	                  <th>Au.deuda</th> 
	                </tr>
	              </thead>
	              <tbody>
	                <?php 
	                	foreach ($data['client']['payments'] as $data) { 
	                		//$dete = strftime("%e/%b/%Y", strtotime($data['dete']));
	                		$dete = date('d/m/Y H:i:s', strtotime($data['dete']));
		                    $outstanding_capital = money_format('%i', $data['outstanding_capital']);
		                    $paid_capital = money_format('%i', $data['paid_capital']);
		                    $interest = money_format('%i', $data['interest']);
		                    $accrued_interest = money_format('%i', $data['accrued_interest']);
		                    $interest_paid = money_format('%i', $data['interest_paid']);
		                    $pending_interest = money_format('%i', $data['pending_interest']);
		                    $increased_debt = money_format('%i', $data['increased_debt']);
		                    $payment_month = money_format('%i', $data['payment_month']);

	                ?>
	                <tr>
	                  <td><?= $dete ?></td>
	                  <td><?= $payment_month ?></td>
	                  <td><?= $interest_paid ?></td>
	                  <td><?= $paid_capital ?></td>
	                  <td><?= $pending_interest ?></td>
	                  <td><?= $outstanding_capital ?></td>
	                  <td><?= $interest ?></td>
	                  <td><?= $accrued_interest ?></td>
	                  <td><?= $increased_debt ?></td> 
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