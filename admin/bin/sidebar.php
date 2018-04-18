<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst($_SESSION['nombre'])." " .ucfirst($_SESSION['apellidoP']) ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="header">MENÚ</li>
        
        <li <?php if ($_SERVER['PHP_SELF'] == '/Estadias/admin/index.php') echo ' class="active"';?>><a href="/Estadias/admin/index.php"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>

        <li class="treeview <?php if($_SERVER['PHP_SELF'] == '/Estadias/admin/escuelas.php' || $_SERVER['PHP_SELF'] == '/Estadias/admin/escuelas-registrar.php') echo 'active';?>">
          
          <a href="#">
            <i class="fa fa-home"></i> <span>Escuelas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li<?php if ($_SERVER['PHP_SELF'] == '/Estadias/admin/escuelas.php') echo ' class="active"';?>>
              <a href="/Estadias/admin/escuelas.php"><i class="fa fa-user"></i> Listado de escuelas</a></li>            

            <li<?php if ($_SERVER['PHP_SELF'] == '/Estadias/admin/escuelas-registrar.php') echo ' class="active"';?>>
              <a href="/Estadias/admin/escuelas-registrar.php"><i class="fa fa-user-plus"></i> Registrar escuela</a></li>

          </ul>

        </li>

                <li class="treeview <?php if($_SERVER['PHP_SELF'] == '/Estadias/admin/alumnos.php' || $_SERVER['PHP_SELF'] == '/Estadias/admin/alumnos-registrar.php') echo 'active';?>">
          
          <a href="#">
            <i class="fa fa-users"></i> <span>Alumnos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li<?php if ($_SERVER['PHP_SELF'] == '/Estadias/admin/alumnos.php') echo ' class="active"';?>>
              <a href="/Estadias/admin/alumnos.php"><i class="fa fa-user"></i> Listado de alumnos</a></li>            

            <li<?php if ($_SERVER['PHP_SELF'] == '/Estadias/admin/alumnos-registrar.php') echo ' class="active"';?>>
              <a href="/Estadias/admin/alumnos-registrar.php"><i class="fa fa-user-plus"></i> Registrar alumnos</a></li>

          </ul>

        </li>

        <li class="treeview <?php if($_SERVER['PHP_SELF'] == '/Estadias/admin/materias.php' || $_SERVER['PHP_SELF'] == '/Estadias/admin/materias.php') echo 'active';?>">
          
          <a href="#">
            <i class="fa fa-book"></i> <span>Materias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li<?php if ($_SERVER['PHP_SELF'] == '/Estadias/admin/alumnos.php') echo ' class="active"';?>>
              <a href="/Estadias/admin/alumnos.php"><i class="fa fa-pencil"></i> Listado de alumnos</a></li>            

            <li<?php if ($_SERVER['PHP_SELF'] == '/Estadias/admin/registrar-alumnos.php') echo ' class="active"';?>>
              <a href="/Estadias/admin/registrar-alumnos.php"><i class="fa fa-user-plus"></i> Registrar alumnos</a></li>

          </ul>

        </li>
        
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>