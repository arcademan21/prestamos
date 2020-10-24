<?php  
  headerAdmin($data['info']); 
  $curr = 'EUR';
?>

<main class="app-content">
  
  <div class="app-title">
    <div>
      <h1><i class="fas fa-chart-line"></i> <?php echo $data['info']->page_title ?> </h1>
      <p><?php echo $data['info']->page_tag ?></p>
    </div>
  
    <!-- <div class="good-message-update-data-base" id="info-updete-database"></div> -->

  </div>
  
  
  <!-- HELPER DEP -->
  <?php //dep($data) ?>

  

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>fecha</th>
                  <th>codigo</th>
                  <th>cliente</th>
                  <th>interes</th>
                  <th>I.pendiente</th>
                  <th>I.abonado</th>
                  <th>C.prestado</th>
                  <th>C.Abonado</th>
                  <th>C.abonado total</th>
                  <th>C.pendiente</th>
                </tr>
              </thead>
              <tbody>
                
                <!-- HELPER DEP -->
                <?php //dep($data['data']['alldata']) ?>

                <?php
                  
                  foreach ($data['data']['alldata'] as $data) { 
                    
                    $client = $data['client'];
                    //$dete = strftime("%e/%b/%Y", strtotime($data['dete']));
                    $dete = date('d/m/Y H:i:s', strtotime($data['dete']));
                    $code = $data['id_customer'];
                    $outstanding_capital = moneyFormat($data['outstanding_capital'], $curr);
                    $paid_capital = moneyFormat($data['paid_capital'], $curr);
                    $interest = moneyFormat($data['interest'], $curr);
                    $accrued_interest = moneyFormat($data['accrued_interest'], $curr);
                    $interest_paid = moneyFormat($data['interest_paid'], $curr);
                    $pending_interest = moneyFormat($data['pending_interest'], $curr);
                    $increased_debt = moneyFormat($data['increased_debt'], $curr);
                    $payment_month = moneyFormat($data['payment_month'], $curr);

                ?>
                <tr>
                  <td><?= $dete ?></td>
                  <td><?= $code  ?></td>
                  <td><?= $client  ?></td>
                  <td><?= $interest ?></td>
                  <td><?= $pending_interest ?></td>
                  <td><?= $interest_paid ?></td>
                  <td><?= $paid_capital ?></td>
                  <td><?= $increased_debt ?></td>
                  <td><?= $payment_month ?></td>
                  <td><?= $outstanding_capital ?></td>
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
	    lengthMenu: [[9, 18, 27, -1], [9, 18, 27, 'Todos']],
	}) //-> Set options data tables

</script>

