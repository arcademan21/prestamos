<?php  headerAdmin($data); ?>

<main class="app-content">
  
  <div class="app-title">
    <div>
      <h1><i class="fas fa-balance-scale"></i> <?php echo $data->page_tag ?> </h1>
      <p><?php echo $data->page_subtitle ?></p>
    </div>
    <!-- <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#"><?php echo $data->page_tag ?></a></li>
    </ul> -->
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <!-- <h3 class="tile-title">Estadisticas de negocio</h3> -->
        <div class="content-select-option-time-chart justify-content-end">
          <select name="" id="times-chart">
            <option value="1">Hoy</option>
            <option value="7">Ultimos 7 dias</option>
            <option value="30">Ultimos 30 dias</option>
          </select>
        </div>
        <div class="embed-responsive embed-responsive-16by9">
          <canvas class="embed-responsive-item" id="lineChartDemo" width="520" height="293" style="width: 520px; height: 293px;"></canvas>
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
  renderCharts(dataDay, {
  	type: 'bar',
  	text: 'Balance de situacion',

  }) //-> show init chart line data
  changeChartsTime() //-> shange chart data info
  setOptionsDataTables({
    pageLength: 4,
    lengthMenu: [[4, 8, 16, -1], [4, 8, 16, 'Todos']],
  }) //-> Set options data tables
</script>