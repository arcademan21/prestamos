<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
  
  <div class="app-sidebar__user">
    <img class="app-sidebar__user-avatar" src="<?php echo media() ?>/images/uploads/persona01.jpg" width="25%" alt="User Image">
    <div>
      <p class="app-sidebar__user-name">
        
        <?php 
          if(strpos($_SESSION['USER_NAME'], '@')){
            $user_name = explode('@', $_SESSION['USER_NAME'])[0];
          }else{
            $user_name = substr($_SESSION['USER_NAME'], 0, 10) ;
          }
          echo ucwords($user_name);
        ?>
          
      </p>
      <p class="app-sidebar__user-designation">Administrador</p>
    </div>
  </div>

  <ul class="app-menu">
    
    <li>
      <a class="app-menu__item" href="<?php echo base_url() ?>/dashboard">
        <i class="app-menu__icon fas fa-chart-line"></i>
        <span class="app-menu__label">Estadisticas</span>
      </a>
    </li>

    <li class="treeview">
      <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon fas fa-users"></i>
        <span class="app-menu__label">Clientes</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?php echo base_url() ?>/clientslist"><i class="icon fas fa-clipboard-list"></i> Lista de clientes</a></li>
        <li><a class="treeview-item" href="<?php echo base_url() ?>/newclient"><i class="icon fas fa-plus-circle"></i> Nuevo cliente</a></li> 
      </ul>
    </li>

    <li class="treeview">

      <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon fas fa-money-check-alt"></i>
        <span class="app-menu__label">Transanciones</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
      </a>

      <ul class="treeview-menu">
        
        

        <li>
          <a class="treeview-item" href="<?php echo base_url() ?>/charges">
            <i class="icon fas fa-money-bill-wave"></i> 
            Abonar
          </a>
        </li>

        <li>
          <a class="treeview-item" href="<?php echo base_url() ?>/borrowmoney">
            <i class="icon fas fa-hand-holding-usd"></i>
            Prestar
          </a>
        </li>

      </ul>
    </li>

    

    <li class="treeview">
      <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon fas fa-file-alt"></i>
        <span class="app-menu__label">Informes</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?php echo base_url() ?>/historial"><i class="icon fas fa-file-invoice"></i> Historial</a></li>
        <li><a class="treeview-item" href="<?php echo base_url() ?>/invoices"><i class="icon fas fa-file-invoice"></i> Facturas</a></li>
        <li><a class="treeview-item" href="<?php echo base_url() ?>/balance"><i class="icon fas fa-balance-scale"></i> Balances</a></li> 
      </ul>
    </li>

  </ul>
</aside>