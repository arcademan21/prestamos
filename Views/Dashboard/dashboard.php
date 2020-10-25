<?php  
  headerAdmin($data['info']); 
  $curr = 'EUR';
?>

<main class="app-content">
  
  <div class="app-title">
    <div>
      <h1><i class="fas fa-chart-line"></i> <?php echo $data['info']->page_tag ?> </h1>
      <p><?php echo $data['info']->page_subtitle ?></p>
    </div>
  
    <!-- <div class="good-message-update-data-base" id="info-updete-database"></div> -->
  
    <ul class="app-breadcrumb breadcrumb" style="padding: 10px; background: #d4cb4b; font-size: 15px;">
      <!-- <li class="breadcrumb-item" ><button class="btn btn-info" id="tempAction">ACCION</button></li> -->
      <li class="breadcrumb-item" id="clock">00:00:00</li>
      <li class="breadcrumb-item">
        <?= date('d M Y') ?>
      </li>
    </ul>
  </div>
  
  <?php 

    //dep($data['data']);

    //OBTIENE EL INTEREST TOTAL ABONADO DEL MES
    $acurred_interest = $data['data']['ACURRED_INTEREST'][0]['ACURRED_INTEREST'];

    //OBTIENE EL CAPITAL ABONADO DE ESTE MES
    $total_capital_of_this_month = $data['data']['TOTAL_CAPITAL_MONTH'][0]['CAPITAL_OF_THIS_MONTH'];

    //OBTIENE EL TOTAL PRESTADO DE ESTE MES
    $total_borrowed_of_this_month = $data['data']['TOTAL_BORROWED_MONTH'][0]['BORROWED_OF_THIS_MONTH'];

    //OBTIENE EL TOTAL PRESTADO
    $borroweds = $data['data']['TOTAL_BORROWED'];
    
    $total_borrowed = 0;

    foreach($borroweds as $total) {
      $total_borrowed += $total['TOTAL_BORROWED'];
    }

    $total_borrowed = $total_borrowed - $total_capital_of_this_month;
    $total_borrowed_of_this_month = $total_borrowed_of_this_month - $total_capital_of_this_month;
    

    //OBTIENE EL INTERES TOTAL PENDIENTE DE ESTE AÑO
    $total_pending_interest = $data['data']['PENDING_INTEREST'][0]['PENDING_INTEREST'];

    //OBTIENE EL INTERES TOTAL PENDIENTE DE ESTE MES
    $total_pending_interest_of_this_month = $data['data']['PENDING_INTEREST_OF_THIS_MONTH'][0]['PENDING_INTEREST'];

    //OBTIENE EL NUMERO TOTAL DE CLIENTES
    $total_clients = $data['data']['CLIENTS'][0]['CLIENTS'];

    //OBTIENE EL NUMERO TOTAL DE CUENTAS SALDADAS
    $total_settled = $data['data']['SETTLED'][0]['SETTLED'];

    //OBTIENE EL NUMERO TOTAL DE CUENTAS PENDIENTES
    $total_debtors = $data['data']['DEBTORS'][0]['DEBTORS'];

    //OBTIENE EL NUMERO TOTAL DE MI CARTERA
    $wallet = $data['data']['WALLET_MOUNT'][0]['MOUNT'];
    
    if($wallet < 0){
      $wallet = 0;
    }

    //dep($data['data']);

  ?>

    <div class="row">

      <div class="col-md-3">
        <div class="widget-small primary coloured-icon">
          <i class="icon fas fa-wallet fa-3x"></i>
          <div class="info">
            <h6>Mi capital actual</h6>
            <b><?= moneyFormat($wallet, $curr) ?></b>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="widget-small danger coloured-icon">
          <i class="icon fas fa-coins fa-3x"></i>
          <div class="info">
            <h6>Prestado este mes</h6>
            <b><?= moneyFormat($total_borrowed_of_this_month, $curr) ?></b>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="widget-small warning coloured-icon">
          <i class="icon fas fa-clock fa-3x"></i>
          <div class="info">
            <h6>Intereses pendiente</h6>
            <b><?= moneyFormat($total_pending_interest, $curr) ?></b>
          </div>
        </div>
      </div>


      <div class="col-md-3">
        <div class="widget-small warning coloured-icon">
          <i class="icon fas fa-file-invoice-dollar fa-3x"></i>
          <div class="info">
            <h6>Interes ha percibir este mes</h6>
            <b><?= moneyFormat($total_pending_interest_of_this_month, $curr) ?></b>
          </div>
        </div>
      </div>
      

      
    
    </div>

    <div class="row">
      
      <div class="col-md-3">
        <div class="widget-small info coloured-icon">
          <i class="icon fas fa-hand-holding-usd fa-3x"></i>
          <div class="info">
            <h6>Capital prestado</h6>
            <b><?= moneyFormat($total_borrowed, $curr) ?></b>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="widget-small primary coloured-icon">
          <i class="icon fas fa-handshake fa-3x"></i>
          <div class="info">
            <h6>Capital abonado de este mes</h6>
            <b><?= moneyFormat($total_capital_of_this_month, $curr) ?></b>
          </div>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="widget-small info coloured-icon">
          <i class="icon fa fa-users fa-3x"></i>
          <div class="info">
            <h6>Numero total de clientes</h6>
            <b><?= $total_clients ?></b>
          </div>
        </div>
      </div>


      

      <div class="col-md-3">
        <div class="widget-small primary coloured-icon">
          <i class="icon fas fa-money-bill-wave fa-3x"></i>
          <div class="info">
            <h6>Interes abonado</h6>
            <b><?= moneyFormat($acurred_interest, $curr) ?></b>
          </div>
        </div>
      </div>
    
    </div>

  <?php  

    $data_chars = [
      'fechas'=>array(),
      'capital_pendiente'=>array(),
      'capital_abonado'=>array(),
      'interes_pendiente'=>array(),
      'interes_abonado'=>array()
    ];

    foreach($data['data']['STADISTICS_BORROWED_MONTH'] as $temp_data) {
      array_push($data_chars['fechas'], array('fecha'=>date('Y-m',strtotime($temp_data['DATES']))));
      array_push($data_chars['capital_pendiente'], array('monto'=>$temp_data['BORROWED']));
      // array_push($data_chars['interes_pendiente'], array('monto'=>$temp_data['pending_interest']));
      // array_push($data_chars['capital_abonado'], array('monto'=>$temp_data['paid_capital']));
      // array_push($data_chars['capital_pendiente'], array('monto'=>$temp_data['outstanding_capital']));
    }

    foreach($data['data']['STADISTICS_PENDING_INTEREST_MONTH'] as $temp_data) {
      array_push($data_chars['fechas'], array('fecha'=>date('Y-m',strtotime($temp_data['DATES']))));
      array_push($data_chars['interes_pendiente'], array('monto'=>$temp_data['PENDING_INTEREST']));
      // array_push($data_chars['interes_pendiente'], array('monto'=>$temp_data['pending_interest']));
      // array_push($data_chars['capital_abonado'], array('monto'=>$temp_data['paid_capital']));
      // array_push($data_chars['capital_pendiente'], array('monto'=>$temp_data['outstanding_capital']));
    }

    foreach($data['data']['STADISTICS_PAID_CAPITAL_MONTH'] as $temp_data) {
      array_push($data_chars['fechas'], array('fecha'=>date('Y-m',strtotime($temp_data['DATES']))));
      array_push($data_chars['capital_abonado'], array('monto'=>$temp_data['PAID_CAPITAL']));
      // array_push($data_chars['interes_pendiente'], array('monto'=>$temp_data['pending_interest']));
      // array_push($data_chars['capital_abonado'], array('monto'=>$temp_data['paid_capital']));
      // array_push($data_chars['capital_pendiente'], array('monto'=>$temp_data['outstanding_capital']));
    }

    foreach($data['data']['STADISTICS_INTEREST_PAID_MONTH'] as $temp_data) {
      array_push($data_chars['fechas'], array('fecha'=>date('Y-m',strtotime($temp_data['DATES']))));
      array_push($data_chars['interes_abonado'], array('monto'=>$temp_data['INTEREST_PAID']));
      // array_push($data_chars['interes_pendiente'], array('monto'=>$temp_data['pending_interest']));
      // array_push($data_chars['capital_abonado'], array('monto'=>$temp_data['paid_capital']));
      // array_push($data_chars['capital_pendiente'], array('monto'=>$temp_data['outstanding_capital']));
    }

  ?>

  <!-- HELPER DEP -->
  <?php //dep($data_chars) ?>

  <!-- <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Grafico mensual del año [ <?= date('Y') ?> ]</h3>
        <div class="content-select-option-time-chart justify-content-end">
          <select name="" id="times-chart">
            <option value="0">HASTA AHORA</option>
            <option value="1">PRIMER TRIMESTRE</option>
            <option value="2">SEGUNDO TRIMESTRE</option>
            <option value="3">TERCER TRIMESTRE</option>
          </select>
        </div>
        <div class="embed-responsive embed-responsive-16by9">
          <canvas class="embed-responsive-item" id="lineChartDemo" width="520" height="293" style="width: 520px; height: 293px;"></canvas>
        </div>
      </div>
    </div>
  </div> -->

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
                  <th>T.movimiento</th>

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
                  <td><?= $code  ?></td>
                  <td><?= $client  ?></td>

                  <td><?= $interest ?></td>
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


<!-- Chart.js -->
<script type="text/javascript" src="<?php echo media() ?>/js/plugins/chart.js"></script>

<!-- DataTable plugin-->
<script type="text/javascript" src="<?php echo media() ?>/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo media() ?>/js/plugins/dataTables.bootstrap.min.js"></script>

<!-- functions.js -->
<script src="<?php echo media() ?>/js/functions.js"></script>

<script>

  renderCharts('<?= json_encode($data_chars) ?>', {
    type: 'line',
    text: 'DE '+month[global_margin]+' A '+month[global_count-2]//+' DEL '+global_num_year
  }) //-> show init chart line data

  changeChartsTime() //-> shange chart data info

  setOptionsDataTables({
    pageLength: 9,
    lengthMenu: [[9, 18, 27, -1], [9, 18, 27, 'Todos']],
  }) //-> Set options data tables

  function clock(){
    
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    if( hora < 9 ){ hora = '0'+hora }
    if( minuto < 9 ){ minuto = '0'+minuto }

    horaImprimible = hora + " : " + minuto

    $('#clock').html(horaImprimible)
  }
  
  setInterval(function(){
    clock()
  },1000)
  


</script>