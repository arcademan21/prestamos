<!DOCTYPE html>
<html lang="es">
  
  <head>

    <meta charset="utf-8">
    <meta name="description" content="Prestamos - ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Haroldy Arturo Perez Rodriguez">
    <meta name="theme-color" content="#009688">
    <meta rel="shortcut icon" href="favicon.ico">
  	<title><?php echo $data->page_title ?></title>

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo media() ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo media() ?>/css/styles.css">
    
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?php echo media() ?>/css/fontawesome/css/all.css">
  
  </head>

  <body class="app sidebar-mini">
    
    <!-- Navbar-->
    <header class="app-header">
    	<a class="app-header__logo" href="<?php echo base_url() ?>/dashboard">Loan System v1.0</a>
      
      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar">
        <i class="fas fa-arrows-alt-h fa-2x"></i>
      </a>
      
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <?php 
          if(count($_GET) > 1){
            $serch_default_value = explode('/', $_GET['url'])[2];
          }else{
            $serch_default_value = "";
          }
          
        ?>
        <li class="app-search">
          <input class="app-search__input" id="app-search__input" type="search" value="<?= $serch_default_value ?>" placeholder="Buscar un cliente...">
          <script type="text/javascript">
            
            let url = "<?php echo base_url() ?>/client/code/"

            function searchClient(url, element){
              window.location.href = url+$(element).val()
            }

          </script>
          <button class="app-search__button" onclick="searchClient(url, '#app-search__input')"><i class="fa fa-search"></i></button>
        </li>
        
        <!--Notification Menu-->
        <!-- <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="far fa-bell fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li>
              	<a class="app-notification__item" href="javascript:;">
              		<span class="app-notification__icon">
              			<span class="fa-stack fa-lg">
              				<i class="fa fa-circle fa-stack-2x text-primary"></i>
              				<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
              			</span>
              		</span>
	                <div>
	                    <p class="app-notification__message">Lisa sent you a mail</p>
	                    <p class="app-notification__meta">2 min ago</p>
	                </div>
              	</a>
          	  </li>
              <li>
              	<a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div>
              	</a>
              </li>
              <li>
              	<a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div>
              	</a>
              </li>
              <div class="app-notification__content">
                <li>
                	<a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
	                    <div>
	                      <p class="app-notification__message">Lisa sent you a mail</p>
	                      <p class="app-notification__meta">2 min ago</p>
	                    </div>
	                </a>
	            </li>
                <li>
                	<a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
	                    <div>
	                      <p class="app-notification__message">Mail server not working</p>
	                      <p class="app-notification__meta">5 min ago</p>
	                    </div>
	                </a>
	            </li>
                <li>
                	<a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
	                    <div>
	                      <p class="app-notification__message">Transaction complete</p>
	                      <p class="app-notification__meta">2 days ago</p>
	                    </div>
	                </a>
	            </li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li> -->
        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fas fa-bars fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?php echo base_url() ?>/profile"><i class="fa fa-user fa-lg"></i> Perfil </a></li>
            <!-- <li><a class="dropdown-item" href="<?php echo base_url() ?>/setings"><i class="fa fa-cog fa-lg"></i> Configuracion</a></li> -->
            <li><span class="dropdown-item" id="logout-btn" type="button"><i class="fas fa-sign-out-alt fa-lg"></i> Salir</span></li>
          </ul>
        </li>

      </ul>
    </header>

    <?php require_once 'nav_admin.php'; ?>