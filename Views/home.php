<?php 

  if(isset($_SESSION['USER_NAME'])){
    header('Location: '.base_url().'/dashboard');
  }else{
    header('Location: '.base_url().'/login');
  }

?>

