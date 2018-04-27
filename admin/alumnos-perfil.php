<?php
  include("bin/conexion.php");
  session_start();
 $nik = mysqli_real_escape_string($mysqli,(strip_tags($_GET["nik"],ENT_QUOTES)));
   include_once("$_SERVER[DOCUMENT_ROOT]/Estadias/admin/bin/conexion.php");
  $sql = "SELECT idMateria, matricula, modulo, max(puntuacion) as puntuacion
                          FROM avance
                          Where matricula = '$nik' and idmateria =3
                          group by modulo
                          order by  modulo asc";
  $query = $mysqli->query($sql);

  if($_SESSION["id_usuario"] == TRUE && $_SESSION["cargo"] == "admin" || $_SESSION["cargo"] == "profesor")

    
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
 
      <h2>Datos del alumno &raquo; Perfil</h2>
      <hr />
      
      <?php
      // escaping, additionally removing everything that could be (html/javascript-) code
      $nik = mysqli_real_escape_string($mysqli,(strip_tags($_GET["nik"],ENT_QUOTES)));
      
      $sql = mysqli_query($mysqli, "
        SELECT alumno.matricula as matricula, alumno.nombre as nombreA, alumno.apellidoP as apellidoP, alumno.apellidoM as apellidoM, alumno.grado as grado, alumno.grupo as grupo, alumno.estatus as estatus, 
        (select escuela.nombre from alumno,escuela where alumno.matricula = '$nik'  and escuela.id = alumno.idescuela) as nombreescuela, alumno.direccion as direccion, alumno.telefono as telefono
        FROM alumno,escuela 
        WHERE alumno.matricula='$nik'");
      //echo $sql;
      if(mysqli_num_rows($sql) == 0){
        //header("Location: index.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      
      if(isset($_GET['aksi']) == 'delete'){
        $delete = mysqli_query($mysqli, "DELETE FROM alumno WHERE matricula='$nik'");
        if($delete){
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Registro eliminado con éxito.</div>';
        }else{
          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Hubo un error al eliminar los datos.</div>';
        }
      }
      ?>
      
      <table class="table table-striped table-condensed">
        <tr>
          <th width="20%">Matricula</th>
          <td><?php echo strtoupper($row['matricula']); ?></td>
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
        <tr>
          <th>Grado y grupo</th>
          <td><?php echo $row['grado'] . " " . $row['grupo']; ?></td>
        </tr>
         <tr>
          <th width="20%">Direccion</th>
          <td><?php echo strtoupper($row['direccion']); ?></td>
        </tr>
         <tr>
          <th width="20%">Telefono</th>
          <td><?php echo strtoupper($row['telefono']); ?></td>
        </tr>
        <tr>
          <th>Estado</th>
          <td>
            <?php 
              if ($row['estatus']==0) {
                echo "Bloqueado";
              } else if ($row['estatus']==1){
                echo "Activo";
              
              }
            ?>
          </td>
        </tr>
        
      </table>
      
      <p style="float:right"><a href="alumnos.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Regresar</a>
      <a href="alumnos-edit.php?nik=<?php echo $row['matricula']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar datos</a>
      <a href="alumnos-perfil.php?aksi=delete&nik=<?php echo $row['matricula']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro de borrar los datos <?php echo $row['nombreA']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a></p>
      <br>
        

        
            <?php
      // escaping, additionally removing everything that could be (html/javascript-) code
            $nik = mysqli_real_escape_string($mysqli,(strip_tags($_GET["nik"],ENT_QUOTES)));
            
              $sqlcn1 = mysqli_query($mysqli, "
              select round(avg(max(puntuacion)),2) as p1
              from avance
              where matricula = '$nik'
              and idMateria = 3 and modulo = 1");
                          //echo $sql;
            if(mysqli_num_rows($sqlcn1) == 0){
              //header("Location: index.php");
            }else{
              $rowcn1 = mysqli_fetch_assoc($sqlcn1);
            }


             $sqlcn2 = mysqli_query($mysqli, "
              select max(puntuacion) as p1
              from avance
              where matricula = '$nik'
              and idMateria = 3 and modulo = 2");
                          //echo $sql;
            if(mysqli_num_rows($sqlcn2) == 0){
              //header("Location: index.php");
            }else{
              $rowcn2 = mysqli_fetch_assoc($sqlcn2);
            }


             $sqlcn3 = mysqli_query($mysqli, "
              select max(puntuacion) as p1
              from avance
              where matricula = '$nik'
              and idMateria = 3 and modulo = 3");
                          //echo $sql;
            if(mysqli_num_rows($sqlcn3) == 0){
              //header("Location: index.php");
            }else{
              $rowcn3 = mysqli_fetch_assoc($sqlcn3);
            }
            ?>



       <table class="table table-striped table-condensed">
        <tr>
          <th width="20%">Historial de Avances</th>
          <td>Matricula : <?php echo strtoupper($row['matricula']); ?></td>
        </tr>
        
         <tr>
          <th width="20%">Espanol</th>
          <td>Bloque 1 : <?php echo strtoupper($row1['matricula']); ?></td>
          <td>Bloque 2 : <?php echo strtoupper($row1['matricula']); ?></td>
          <td>Bloque 3 : <?php echo strtoupper($row1['matricula']); ?></td>
          <td>Bloque 4 : <?php echo strtoupper($row1['matricula']); ?></td>
          <td>Bloque 5 : <?php echo strtoupper($row1['matricula']); ?></td>
        </tr>

         <tr>
          <th width="20%">Matemáticas</th>
          <td>Bloque 1 : <?php echo strtoupper($row1['matricula']); ?></td>
          <td>Bloque 2 : <?php echo strtoupper($row1['matricula']); ?></td>
          <td>Bloque 3 : <?php echo strtoupper($row1['matricula']); ?></td>
          <td>Bloque 4 : <?php echo strtoupper($row1['matricula']); ?></td>
          <td>Bloque 5 : <?php echo strtoupper($row1['matricula']); ?></td>
        </tr>

         <tr>
          <th width="20%">Ciencias Naturales</th>
           <td>Bloque 1 : <?php echo strtoupper($rowcn1['p1']); ?></td>
        </tr>

      </table>

      <br>


<?php $nik = mysqli_real_escape_string($mysqli,(strip_tags($_GET["nik"],ENT_QUOTES))); ?>
                
                            <!-- this is where we show our chart -->
<div id="chart" style="width: 900px; height: 500px;"></div>
 
<!-- Load our Scripts -->

<script type="text/javascript">  
  google.charts.load('current', {'packages':['corechart']});  
  google.charts.setOnLoadCallback(drawChart);  
  function drawChart(){  
    var data = google.visualization.arrayToDataTable([  
                ['Modulo', 'Puntuacion'],  
                <?php  
                  while($row = $query->fetch_assoc()){  
                    echo "['".$row["modulo"]."', ".$row["puntuacion"]."],";  
                  }  
                ?>  
          ]);  
    var options = {  
              title: 'Puntajes para el bloque de Ciencias Naturales',  
              is3D:true,  
              pieHole: 0.4,  
              gridlines: {count: 8},
              intervals: { 'style':'line' },
              vAxis: {
      minValue: 3,
      maxValue: 7,
      direction: 1
    },
    hAxis: {
      slantedTextAngle: 70,
      maxTextLines: 100,
      textStyle: {

        fontSize: 12,
      } // or the number you want}
    },

          };  
    var chart = new google.visualization.ColumnChart(document.getElementById('chart'));  
    chart.draw(data, options);  
}  
</script>

      <div class="container-fluid">
      <div id="columnchart" style="width: 100%; height: 500px;"></div>
      </div>
      

      <!-- Main row -->
    
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