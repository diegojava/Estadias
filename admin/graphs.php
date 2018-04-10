<?php
	session_start();
	if($_SESSION["id_usuario"] == TRUE && $_SESSION["rol"] == 2) {
 $con = mysqli_connect('localhost','root','root','prueba');
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
	<link rel="stylesheet" href="/Estadias/admin/graphs/lib/js/chartphp.css">
  <script src="/Estadias/admin/graphs/lib/js/jquery.min.js"></script>
  <script src="/Estadias/admin/graphs/lib/js/chartphp.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

				<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {
var data = google.visualization.arrayToDataTable([

['escuela','cantidad'],
<?php
		 $query = "SELECT escuela, count(escuela) as cantidad from alumnos
group by escuela";

			$exec = mysqli_query($con,$query);
			while($row = mysqli_fetch_array($exec)){

			echo "['".$row['escuela']."',".$row['cantidad']."],";
			}
			?>

]);
var options = {
title: 'Número de estudiantes por escuela',
 pieHole: 0.5,
				 pieSliceTextStyle: {
					 color: 'black',
				 },
				 legend: 'none'
};
var chart = new google.visualization.PieChart(document.getElementById("columnchart12"));
chart.draw(data,options);
}

	 </script>

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="./" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>ANEL</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Panel</b>Admón</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['id_usuario'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">

          <p><?php echo ucfirst($_SESSION['nombre'])." " .ucfirst($_SESSION['apellidoP']) ?></p>

          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

			<!-- search form
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
								</button>
							</span>
				</div>
			</form>
			/.search form -->
			<!-- Sidebar Menu -->
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MENÚ</li>
				<!-- Optionally, you can add icons to the links -->
				<li><a href="/Estadias/admin"><i class="fa fa-dashboard"></i> <span>Página principal</span></a></li>
				<li><a href="/Estadias/admin/alumnos.php"><i class="fa fa-user"></i> <span>Alumnos</span></a></li>
				<li class="active"><a href="/Estadias/admin/graphs.php"><i class="fa fa-book"></i> <span>Materias</span></a></li>
				<li class="active"><a href="/Estadias/admin/graphs.php"><i class="fa fa-sticky-note"></i> <span>Examenes</span></a></li>

					<li class="active"><a href="/Estadias/admin/graphs.php"><i class="fa fa-bar-chart"></i> <span>Gráficos</span></a></li>

				<li class="treeview">
					<a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
						<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#">Link in level 2</a></li>
						<li><a href="#">Link in level 2</a></li>
					</ul>
				</li>
			</ul>
			<!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registro de Alumnos
        <small>Ingresa los datos del alumno</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

				<div class="container-fluid">
	 <div id="columnchart12" style="width: 100%; height: 500px;"></div>
	 </div>

        <form method="post" action="php/insertar_alumno.php" NAME="Formulario" enctype="multipart/form-data" style="margin:0px;">
          <div class="form-group has-success">
                  <label class="control-label" for="inputSuccess">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa Nombre" onkeyup="poner(this.form)">
           </div>

            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">Apellido Paterno</label>
               <input type="text" class="form-control" id="apaterno" name="apaterno" placeholder="Ingresa Apellido Paterno" onkeyup="poner(this.form)">
            </div>

            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">Apellido Materno</label>
               <input type="text" class="form-control" id="amaterno" name="amaterno" placeholder="Ingresa Apellido Materno" onkeyup="poner(this.form)">
            </div>



            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">Escuela</label>
								<br>
								<select id="escuela" name="escuela" onclick="poner(this.form)">
									<option value="UT">Universidad Tecnológica</option>
								  <option value="NH">Esc. Niños Héroes</option>
								  <option value="BA">Benémerito de las Américas</option>
								  <option value="PI">ESPI</option>
								</select>
                </div>

            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">Grado</label>
               <input type="text" class="form-control" id="grado" name="grado" placeholder="Ingresa Grado" onkeyup="poner(this.form)">
            </div>

            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">Grupo</label>
               <input type="text" class="form-control" id="grupo" name="grupo" placeholder="Ingresa Grupo" onkeyup="poner(this.form)">
            </div>
            <p>Datos del login</p>
            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">Matricula</label>
               <input type="text" id="matricula" name="matricula" readonly style="text-transform:uppercase">
            </div>

            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">Contraseña</label>
               <input type="text" id="contrasena" name="contrasena">
            </div>
              <br>
               <input type="submit" class="btn btn-success" align="right" value="Registrar" />
              </form>




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

     <script type="text/javascript">
   		function poner(frm) {
    		 frm.matricula.value = frm.nombre.value.substr(0,1) + frm.apaterno.value.substr(0,1) + frm.amaterno.value.substr(0,1) + frm.escuela.value.substr()+ frm.grado.value.substr()+ frm.grupo.value.substr();
   		}
   	</script>
</body>
</html>
<?php
	} else {
		header("Location: /Estadias/index.php");
	}

 ?>
