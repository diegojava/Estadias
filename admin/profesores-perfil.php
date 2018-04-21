<?php
  include("bin/conexion.php");
  session_start();
  if($_SESSION["id_usuario"] == TRUE && $_SESSION["cargo"] == "admin")

    
  {
?>
<!DOCTYPE html>
<html>
<head>
  <!-- LLAMAMOS A TRAER EL HEADER -->
  <?php include_once(__DIR__."/bin/header.php"); ?>
          
          <script type="text/javascript" src="https://www.google.com/jsapi"></script>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


 
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
      
      <ol class="breadcrumb">
        <li><a href="/Estadias/admin/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Alumnos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 
      <h2>Datos del profesor &raquo; Perfil</h2>
      <hr />
      
      <?php
      // escaping, additionally removing everything that could be (html/javascript-) code
      $nik = mysqli_real_escape_string($mysqli,(strip_tags($_GET["nik"],ENT_QUOTES)));
      
      $sql = mysqli_query($mysqli, "
        SELECT usuarios.usuario as usuario, usuarios.nombre as nombreA, usuarios.apellidoP as apellidoP, usuarios.apellidoM as apellidoM, usuarios.telefono as telefono, usuarios.correo as correo, usuarios.direccion as direccion, 
        (select escuela.nombre from usuarios,escuela where usuarios.usuario = '$nik'  and escuela.id = usuarios.idescuela) as nombreescuela
        FROM usuarios,escuela 
        WHERE usuarios.usuario='$nik'");
      //echo $sql;
      if(mysqli_num_rows($sql) == 0){
        //header("Location: index.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      
      if(isset($_GET['aksi']) == 'delete'){
        $delete = mysqli_query($mysqli, "DELETE FROM usuarios WHERE usuario='$nik'");
        if($delete){
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Registro eliminado con éxito.</div>';
        }else{
          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>';
        }
      }
      ?>
      
      <table class="table table-striped table-condensed">
        <tr>
          <th width="20%">Usuario</th>
          <td><?php echo strtoupper($row['usuario']); ?></td>
        </tr>
        <tr>
          <th>Nombre  Completo</th>
          <td><?php echo strtoupper($row['nombreA']) . " " . strtoupper($row['apellidoP']) . " " . strtoupper($row['apellidoM']); ?></td>
        </tr>
        <tr>
          <th width="20%">Escuela</th>
          <td><?php echo strtoupper($row['nombreescuela']); ?></td>
        </tr>
        <tr>
          <th width="20%">Direccion</th>
          <td><?php echo strtoupper($row['direccion']); ?></td>
        </tr>
        <tr>
          <th width="20%">Teléfono</th>
          <td><?php echo strtoupper($row['telefono']); ?></td>
        </tr>
        <tr>
          <th width="20%">Correo</th>
          <td><?php echo strtoupper($row['correo']); ?></td>
        </tr>  
      </table>
      
      <p style="float:right"><a href="profesores.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Regresar</a>
      <a href="profesores-edit.php?nik=<?php echo $row['usuario']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar datos</a>
      <a href="profesores-perfil.php?aksi=delete&nik=<?php echo $row['usuario']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro de borrar los datos <?php echo $row['nombreA']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a></p>
      <br><br>

                <script type="text/javascript">
                 google.load("visualization", "1", {packages:["corechart"]});
                 google.setOnLoadCallback(drawChart);
                 function drawChart() {
                 var data = google.visualization.arrayToDataTable([
           
                ['Escuela','Numero'],
                <?php 
                $query = "SELECT nombreA, sum(horas) as suma FROM alumnos Where matricula = '".$row['matricula']."'";
           
                 $exec = mysqli_query($mysqli,$query);
                 while($row = mysqli_fetch_array($exec)){
           
                 echo "['".$row['nombreA']."',".$row['suma']."],";
                 }
                 ?> 
           
                  ]);
 
                 var options = {
                 title: 'Horas empleadas por el alumno en cada módulo',
                  pieHole: 0.5,
                          pieSliceTextStyle: {
                            color: 'black',
                          },
                          legend: 'none'
                 };
                 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
                 chart.draw(data,options);
                 }
                 </script>

      <div class="container-fluid">
      <div id="columnchart" style="width: 100%; height: 500px;"></div>
      </div>
      

      <!-- Main row -->
      <div class="row">

        <!-- Left col -->
      
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
    header("Location: /Estadias/login.php");
  }
 ?>