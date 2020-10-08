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
  	<title>Login</title>
    

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo media() ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo media() ?>/css/styles.css">
    
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?php echo media() ?>/css/fontawesome/css/all.css">
  
</head>
<body>
  
  



	<section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Loan System v1.0</h1>
      </div>
      <div class="login-box">
        
        <form class="login-form" id="login-form">
          
          
          
          <div class="form-group">
            <label class="control-label">USUARIO</label>
            <input class="form-control" type="text" id="user" placeholder="Usuario..." autofocus required>
          </div>

          <div class="form-group">
            <label class="control-label">CONTRASEÑA</label>
            <input class="form-control" type="password" id="passw" placeholder="Contraseña" required>
          </div>

          <div class="form-group">
            <div class="utility justify-content-center">
              <!-- <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Recordarme</span>
                </label>
              </div> -->
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidaste tu contraseña ?</a></p>
            </div>
          </div>

          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> INICIAR</button>
          </div>

        </form>
        <form class="forget-form" action="index.html">
          
          <div class="form-group">
            <label class="control-label">USUARIO</label>
            <input class="form-control" type="text" placeholder="Usuario...">
          </div>
          <div class="form-group">
            <label class="control-label">RESGUARDO</label>
            <input class="form-control" type="text" placeholder="Resguardo...">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESTABLECER</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Volver a iniciar sesion</a></p>
          </div>
        </form>
      </div>
    </section>
    
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo media() ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo media() ?>/js/popper.min.js"></script>
    <script src="<?php echo media() ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo media() ?>/js/main.js"></script>
    
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo media() ?>/js/plugins/pace.min.js"></script>

    <!-- Sweet alert -->
    <script type="text/javascript" src="<?php echo media() ?>/js/plugins/sweetalert.min.js"></script>
 
    <!-- functions.js -->
	  <script src="<?php echo media() ?>/js/functions.js"></script>

    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>

    

</body>
</html>