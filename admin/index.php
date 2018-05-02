<?php
  session_start();
  include_once("$_SERVER[DOCUMENT_ROOT]/Estadias/admin/bin/conexion.php");
  $sql = "SELECT escuela.nombre as nombreescuela, count(matricula) as suma
from alumno, escuela
where escuela.id = alumno.idescuela
group by idescuela";
  $query = $mysqli->query($sql);


  if($_SESSION["id_usuario"] == TRUE && $_SESSION["cargo"] == "admin" || $_SESSION["cargo"] == "profesor")
  {
?>
<!DOCTYPE html>
<html>
<head>
  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  

  <!-- LLAMAMOS A TRAER EL HEADER -->
  <?php include_once(__DIR__."/bin/header.php"); ?>
  <title>Inicio | Administración</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- LLAMAMOS A TRAER EL ENCABEZADO -->
  <?php include_once(__DIR__."/bin/cabeza.php"); ?>

  <!-- TRAEMOS EL SIDEBAR DE LA IZQUIERDA -->
  <?php include_once(__DIR__."/bin/sidebar.php"); ?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel de administración
        <small>vista general</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de Administración</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- CAJA INFO DE ALUMNOS -->
          <?php include_once(__DIR__."/bin/cajas-info/alumnos.php") ?>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- CAJA INFO #2 -->
          <?php include_once(__DIR__."/bin/cajas-info/escuelas.php") ?>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         <?php include_once(__DIR__."/bin/cajas-info/bloqueados.php") ?>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php include_once(__DIR__."/bin/cajas-info/horas.php") ?>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="pull-left header"><i class="fa fa-inbox"></i> Gráfica</li>
            </ul>
            <!-- this is where we show our chart -->
            <div id="chart" style="width: 900px; height: 500px;"></div>
             
            <!-- Load our Scripts -->

            <script type="text/javascript">  
              google.charts.load('current', {'packages':['corechart']});  
              google.charts.setOnLoadCallback(drawChart);  
              function drawChart(){  
                var data = google.visualization.arrayToDataTable([  
                            ['Nombre de la Escuela', 'Total de alumnos'],  
                            <?php  
                              while($row = $query->fetch_assoc()){  
                                echo "['".$row["nombreescuela"]."', ".$row["suma"]."],";  
                              }  
                            ?>  
                      ]);  
                var options = {  
                          title: 'Número de alumnos por escuela',  
                          //is3D:true,  
                          pieHole: 0.4  
                          
                      };  
                var chart = new google.visualization.ColumnChart(document.getElementById('chart'));  
                chart.draw(data, options);  
            }  
            </script>
            </body>
          </div>
        
        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once(__DIR__."/bin/footer.php") ?>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include_once(__DIR__."/bin/scripts.php") ?>
</body>
</html>
<?php
  } else {
    header("Location: /Estadias/admin/login.php");
  }
 ?>
