<?php  headerAdmin($data); ?>

<main class="app-content">
  
  <div class="app-title">
    <div>
      <h1><i class="fas fa-file-invoice"></i> <?php echo $data->page_tag ?> </h1>
      <p><?php echo $data->page_subtitle ?></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">

      <li class="app-search">
        <input class="app-search__input" type="search" style="background-color: #d1e9e7;" placeholder="Buscar factura...">
        <button class="app-search__button"><i class="fa fa-search"></i></button>
      </li>
      <!-- <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#"><?php echo $data->page_tag ?></a></li> -->
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <section class="invoice">
          <div class="row mb-4">
            <div class="col-6">
              <h2 class="page-header"><i class="fab fa-pied-piper"></i> Nombre de empresa</h2>
            </div>
            <div class="col-6">
              <h5 class="text-right">Fecha: 01/01/2016</h5>
            </div>
          </div>
          <div class="row invoice-info">
            <div class="col-4">
              Desde
              <address>
                <strong>
                  Nombre de empresa.
                </strong><br>
                518 Akshar Avenue<br>
                Gandhi Marg<br>
                New Delhi<br>
                Email: hello@vali.com
              </address>
            </div>
            <div class="col-4">
              para
              <address>
                <strong>John Doe</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (555) 539-1037
              </address>
            </div>
            <div class="col-4">
              <b>factura: #007612</b><br>
              <b>ID:</b> 4F3S8J<br>
              <b>Fecha de pago:</b> 2/22/2014<br>
              <b>Cliente:</b> 968-34567
            </div>
          </div>
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Abonado</th>
                    <th>Interes</th>
                    <th>Restante</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>10/09/2020</td>
                    <td>100,00€</td>
                    <td>10%</td>
                    <td>800€</td>
                    <td>700€</td>
                  </tr>
                  <tr>
                    <td>10/09/2020</td>
                    <td>100,00€</td>
                    <td>10%</td>
                    <td>800€</td>
                    <td>700€</td>
                  </tr>
                  <tr>
                    <td>10/09/2020</td>
                    <td>100,00€</td>
                    <td>10%</td>
                    <td>800€</td>
                    <td>700€</td>
                  </tr>
                  <tr>
                    <td>10/09/2020</td>
                    <td>100,00€</td>
                    <td>10%</td>
                    <td>800€</td>
                    <td>700€</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row d-print-none mt-2">
            <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Imprimir</a></div>
          </div>
        </section>
      </div>
    </div>
  </div>

</main>



<?php footerAdmin($data); ?>