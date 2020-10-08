<!-- Modal -->
<div class="modal fade" id="modalDetailsClient" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><?= ucwords($data['customer'][0]['name']) ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php //dep($data) ?>
          <div class="row">
            <div class="col-md-6">
              
                <ul class="list-group" style="text-align: justify;">
                  <li class="list-group-item">Nombre: &nbsp; <?= ucwords($data['customer'][0]['name']) ?></li>
                  <li class="list-group-item">Apellidos: &nbsp; <?= ucwords($data['customer'][0]['full_name']) ?></li>
                  <li class="list-group-item">Telefono: &nbsp; <?= ucwords($data['customer'][0]['phone']) ?></li>
                  <li class="list-group-item">Idcode: &nbsp; <?= substr($data['customer'][0]['id_customer'], 1) ?></li></li>
                </ul>
              
            </div>
            
            <div class="col-md-6">
              <?php  
                $temp = $data['customer'][0]['payment_status'];
                if($temp == 'pending'){
                  $payment_status = 'Pendiente';
                }else if($temp == 'solved'){
                  $payment_status = 'Solventada';
                }
              ?>
              <ul class="list-group" style="text-align: justify;">
                <li class="list-group-item">Estado de la deuda: &nbsp; <b><?= $payment_status ?></b></li>
                <li class="list-group-item">Fecha de inicio: <b> &nbsp; <?= ucwords(strftime("%B %Y", strtotime($data['customer'][0]['start_month']))) ?></b></li>
                <li class="list-group-item">Prestamo inicial: <b> &nbsp; <?= money_format('%i', $data['customer'][0]['initial_loan']) ?></b></li>
                <li class="list-group-item">Prestamo de este mes: <b> &nbsp; <?= money_format('%i', $data['global']['increased_debt']) ?></b></li>
                <li class="list-group-item">Interes del mes: <b> &nbsp; <?= money_format('%i', $data['global']['interest']) ?></b></li>
                <li class="list-group-item">Interes pendiente: <b> &nbsp; <?= money_format('%i', $data['global']['pending_interest']) ?></b></li>
                <li class="list-group-item">Capital del abonado: <b> &nbsp; <?= money_format('%i', $data['global']['paid_capital']) ?></b></li>
                <li class="list-group-item">Capital pendiente: <b> &nbsp; <?= money_format('%i', $data['global']['outstanding_capital']) ?></b></li>
              </ul>
              
            </div>
          </div>

		      	

		   

        </div>
      
    </div>
  </div>
</div>