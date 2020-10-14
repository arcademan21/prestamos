<?php 
  headerAdmin($data->info);
  //getModal('modalDetailsClient', $data);
?>


<main class="app-content">

	<!-- HELPER DEP -->
	<?php //echo dep($data) ?>

	<div class="app-title">
	    <div>
	      <h1><i class="fas fa-chart-line"></i> <?php echo $data->info->page_tag ?> </h1>
	      <p><?php echo $data->info->page_subtitle ?></p>
	    </div>
	    <!-- <ul class="app-breadcrumb breadcrumb" style="padding: 10px; background: #d4cb4b; font-size: 15px;">
	      <li class="breadcrumb-item" id="clock">
	        
	      </li>
	      <li class="breadcrumb-item">
	        <?= date('d M Y') ?>
	      </li>
	    </ul> -->
	  </div>
	<div class="row user">
        
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="<?= base_url() ?>/Assets/images/uploads/persona01.jpg">
              <h4>
              	<?php 
		          if(strpos($_SESSION['USER_NAME'], '@')){
		            $user_name = explode('@', $_SESSION['USER_NAME'])[0];
		          }else{
		            $user_name = substr($_SESSION['USER_NAME'], 0, 6) ;
		          }
		          echo $user_name;
		        ?>
              </h4>
              <p>Administrador</p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-settings" data-toggle="tab">Mi cartera</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-black-list" data-toggle="tab">Lista negra</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-timeline" data-toggle="tab">Mis movimientos</a></li>
              
            </ul>
          </div>
        </div>

        <div class="col-md-9">
          
          <div class="tab-content">

          	<div class="tab-pane active" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Opciones</h4>

                <div class="bs-component">
			        <ul class="nav nav-tabs">
			            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#insert_money"><i class="fas fas fa-plus-circle"></i> Sumar dinero</a></li>
			            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#money_out"><i class="fas fa-minus-circle"></i> Restar dinero</a></li>
	                </ul>
	                <div class="tab-content" id="myTabContent">
			            <div class="tab-pane fade active show" id="insert_money">
			              	
			              	<div class="col-md-12">
				                <div class="tile-body">

				                	<form style="padding: 25px 0;" id="wallet-plus">
				                    
					                    
					                    <div class="form-group">

					                      <div class="row">
					                        
					                        <div class="col-md-3">
					                          <label class="control-label" for="initial_loan">Cantidad</label>
					                        </div>

					                      </div>

					                      <div class="row">
					                        
					                        <div class="col-md-3">
					                          <input type="number" class="form-control" id="plus-wallet" value="0" placeholder="0" step="0.1" style="position: relative; float: left; width: 65%;"> 
					                          <span style="position: relative; float: left; font-size: 25px; margin-left: 5px;">€</span>
					                        </div>
					                        
					                      </div>
					                      
					                    </div>

					                    <div class="tile-footer">
							                <button class="btn btn-primary" type="submit">
							                  <i class="fa fa-fw fa-lg fa-check-circle"></i>
							                  Realizar el ingreso
							                </button>
						             	</div>

					                </form>


				                </div>
				            </div>

				            

				        </div>

				        <div class="tab-pane fade  show" id="money_out">
			              	
			              	<div class="col-md-12">
				                <div class="tile-body">

				                	<form style="padding: 25px 0;" id="wallet-rest">
				                    
					                    <div class="row">
					                        
					                        <div class="col-md-3">
					                          <label class="control-label" for="initial_loan">Cantidad</label>
					                        </div>

					                    </div>

					                    <div class="row">
					                        
					                        <div class="col-md-3">
					                          <input type="number" class="form-control" id="rest-wallet" value="0" placeholder="0" step="0.1" style="position: relative; float: left; width: 65%;"> 
					                          <span style="position: relative; float: left; font-size: 25px; margin-left: 5px;">€</span>
					                        </div>
					                        
					                    </div>

					                    <div class="tile-footer">
							                <button class="btn btn-primary" type="submit">
							                  <i class="fa fa-fw fa-lg fa-check-circle"></i>
							                  Realizar retiro
							                </button>
						             	</div>

					                </form>


				                </div>
				            </div>

				            

				        </div>
				    </div>
				</div>

                 




              </div>  
            </div>

            <div class="tab-pane fade" id="user-black-list">
              <div class="tile user-black-list">
              	<?= $data->data->message  ?>
              </div>
              

              

            </div>
            
            <div class="tab-pane fade" id="user-timeline">
              
              <div class="timeline-post">
                
                <div class="post-media"><a href="#"><img src="<?= base_url() ?>/Assets/images/uploads/persona01.jpg" width="7%"></a>
                  <div class="content">
                    <h5><a href="#">John Doe</a></h5>
                    <p class="text-muted"><small>2 January at 9:30</small></p>
                  </div>
                </div>

                <div class="post-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <ul class="post-utility">
                  <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                  <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                  <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                </ul>

              </div>

              <div class="timeline-post">
                
                <div class="post-media"><a href="#"><img src="<?= base_url() ?>/Assets/images/uploads/persona01.jpg" width="7%"></a>
                  <div class="content">
                    <h5><a href="#">John Doe</a></h5>
                    <p class="text-muted"><small>2 January at 9:30</small></p>
                  </div>
                </div>

                <div class="post-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <ul class="post-utility">
                  <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                  <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                  <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                </ul>

              </div>

            </div>

            


          </div>
        </div>
    </div>
</main>

<?php footerAdmin($data); ?>  

<!-- functions.js -->
<script src="<?php echo media() ?>/js/functions.js"></script> 

