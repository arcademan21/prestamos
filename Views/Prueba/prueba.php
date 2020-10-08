<?php  headerAdmin($data); ?>

<main class="app-content">
  
  <div class="app-title">
    <div>
      <h1><i class="fas fas fa-money-bill-wave"></i> <?php echo $data->page_tag ?> </h1>
      <p><?php echo $data->page_subtitle ?></p>
    </div>
    <!-- <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#"><?php echo $data->page_tag ?></a></li>
    </ul> -->
  </div>

  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="tile">
        <h1>Prueba</h1>
      </div>
    </div>
  </div>

</main>



<?php footerAdmin($data); ?>