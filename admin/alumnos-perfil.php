<?php
  include("bin/conexion.php");
  session_start();
  if($_SESSION["id_usuario"] == TRUE && $_SESSION["rol"] == 2)
  {
?>
<!DOCTYPE html>
<html>
<head>

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
        <small>sección: alumnos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/Estadias/admin/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Alumnos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 
      <h2>Datos del empleados &raquo; Perfil</h2>
      <hr />
      
      <?php
      // escaping, additionally removing everything that could be (html/javascript-) code
      $nik = mysqli_real_escape_string($mysqli,(strip_tags($_GET["nik"],ENT_QUOTES)));
      
      $sql = mysqli_query($mysqli, "SELECT * FROM alumnos WHERE matricula='$nik'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: index.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      
      if(isset($_GET['aksi']) == 'delete'){
        $delete = mysqli_query($mysqli, "DELETE FROM alumnos WHERE matricula='$nik'");
        if($delete){
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Registro eliminado con éxito.</div>';
        }else{
          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>';
        }
      }
      ?>
      
      <table class="table table-striped table-condensed">
        <tr>
          <th width="20%">Matricula</th>
          <td><?php echo $row['matricula']; ?></td>
        </tr>
        <tr>
          <th>Nombre</th>
          <td><?php echo $row['nombreA']; ?></td>
        </tr>
        <tr>
          <th>Apellido P.</th>
          <td><?php echo $row['apellidoP']; ?></td>
        </tr>
        <tr>
          <th>Apellido M.</th>
          <td><?php echo $row['apellidoM']; ?></td>
        </tr>
        <tr>
          <th>Escuela</th>
          <td><?php if ($row['escuela']=='NH')echo "Niños Héroes";
          else if ($row['escuela']=='BA')echo "Benémerito de las Américas";
          else if ($row['escuela']=='UT')echo "Universidad Tecnológica";
          else if ($row['escuela']=='PI')echo "ESPI";
           ?></td>

        </tr>
        <tr>
          <th>Grado</th>
          <td><?php echo $row['grado']; ?></td>
        </tr>
        <tr>
          <th>Grupo</th>
          <td><?php echo $row['grupo']; ?></td>
        </tr>
        <tr>
          <th>Estado</th>
          <td>
            <?php 
              if ($row['isActivo']==0) {
                echo "Bloqueado";
              } else if ($row['isActivo']==1){
                echo "Activo";
              } else if ($row['estado']==3){
                echo "Outsourcing";
              }
            ?>
          </td>
        </tr>
        
      </table>
      
      <a href="alumnos.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Regresar</a>
      <a href="alumnos-edit.php?nik=<?php echo $row['matricula']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar datos</a>
      <a href="alumnos-perfil.php?aksi=delete&nik=<?php echo $row['matricula']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro de borrar los datos <?php echo $row['nombreA']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>


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