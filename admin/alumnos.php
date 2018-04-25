<?php
  include("bin/conexion.php");
  session_start();
  if($_SESSION["id_usuario"] == TRUE && $_SESSION["cargo"] == "admin" || $_SESSION["cargo"] == "profesor")
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
 
      <?php
      if(isset($_GET['aksi']) == 'delete'){
        // escaping, additionally removing everything that could be (html/javascript-) code
        $nik = mysqli_real_escape_string($mysqli,(strip_tags($_GET["nik"],ENT_QUOTES)));
        $cek = mysqli_query($mysqli, "SELECT * FROM alumno WHERE matricula='$nik'");
        if(mysqli_num_rows($cek) == 0){
          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($mysqli, "DELETE FROM alumno WHERE matricula='$nik'");
          if($delete){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
          }
        }
      }
      ?>
 
      <?php if($_SESSION["id_usuario"] == TRUE && $_SESSION["cargo"] == "admin"){ ?>
      <form class="form-inline" method="get">
        <div class="form-group">
          <select name="filter" class="form-control" onchange="form.submit()">
            <!--<option value="0">Filtros de datos de alumnos</option>-->
            <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);
            $sql="SELECT id as idescuela1, identificador as identi1, nombre as nombreescuela1 FROM escuela"; 
            $consulta=mysqli_query($mysqli,$sql); 
            ?>
            <?php 
             echo "<option value=''>Selecciona una opcion</option>";
             echo "<option value=''>Todos</option>";
            while($row=mysqli_fetch_array($consulta)) 
            {

            echo "<option";?> <?php if($filter == $row['identi1']){ echo 'selected'; } ?> <?php echo "value='" . $row['identi1'] . "'>" . $row['nombreescuela1'] . "</option>"; 
            } 
            

            ?>
          </select>
        </div>
      </form>
      <?php } ?>
      <br>
      <br />
      <div class="table-responsive">
      <table class="table table-striped table-hover">
        <tr>
                    <th>No</th>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Escuela</th>
                    <th>Grado</th>
                    <th>Grupo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
        </tr>
        <?php
        
        if($_SESSION["id_usuario"] == TRUE && $_SESSION["cargo"] == "admin"){

        if($filter){
          $sql = mysqli_query($mysqli, "SELECT alumno.matricula as matricula, alumno.nombre as nombre, alumno.apellidoP as apellidoP, alumno.apellidoM as apellidoM, escuela.nombre as escuela, alumno.grado as grado, alumno.grupo as grupo, alumno.estatus as estatus
            FROM alumno,escuela
            Where alumno.idescuela = escuela.id
            and identificador='$filter'
            order by ApellidoP ASC");
        } else if(!$filter){
          //$sql = mysqli_query($mysqli, "SELECT * FROM alumno ORDER BY matricula ASC");

          //if($_SESSION["id_usuario"] == TRUE && $_SESSION["cargo"] == "admin"){
          $sql = mysqli_query($mysqli, "
            SELECT alumno.matricula as matricula, alumno.nombre as nombre, alumno.apellidoP as apellidoP, alumno.apellidoM as apellidoM, escuela.nombre as escuela, alumno.grado as grado, alumno.grupo as grupo, alumno.estatus as estatus
            FROM alumno,escuela
            Where alumno.idescuela = escuela.id
            order by ApellidoP ASC"); 
        }}

          else if($_SESSION["id_usuario"] == TRUE && $_SESSION["cargo"] == "profesor"){
            $idProf = $_SESSION['id'];
            $sql = mysqli_query($mysqli, "
            SELECT alumno.matricula as matricula, alumno.nombre as nombre, alumno.apellidoP as apellidoP, alumno.apellidoM as apellidoM, escuela.nombre as escuela, alumno.grado as grado, alumno.grupo as grupo, alumno.estatus as estatus
            FROM alumno,escuela
            Where alumno.idescuela = escuela.id AND alumno.idProfesor = $idProf
            order by ApellidoP ASC"); 
        }

        
        if(mysqli_num_rows($sql) == 0){
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{
          $no = 1;
          while($row = mysqli_fetch_assoc($sql)){
            
           



            //$sqlnombre = mysqli_query($mysqli, "SELECT escuela.nombre FROM alumno,escuela WHERE escuela.id = $nombreEscuela and escuela.id = alumno.idescuela) as nombreescuela");
            //mysqli_result($sqlnombre);

            echo '
            <tr>
              <td>'.$no.'</td>
              <b><td><a href="alumnos-perfil.php?nik='.$row['matricula'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.strtoupper($row['matricula']).'</a></td></b>
              <td> '.$row['nombre']. ' ' .$row['apellidoP']. ' ' .$row['apellidoM'].'</td>
                           
                            <td>'.$row['escuela'].'</td>
                            <td>'.$row['grado'].'</td>
                            <td>'.$row['grupo'].'</td>
                            

              <td>';
              if($row['estatus'] == '1'){
                echo '<span class="label label-success">Activo</span>';
              }
                            else if ($row['estatus'] == '0' ){
                echo '<span class="label label-danger">Bloqueado</span>';
              }
                     
            echo '
              </td>
              <td>
 
                <a href="alumnos-edit.php?nik='.$row['matricula'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <a href="alumnos.php?aksi=delete&nik='.$row['matricula'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombre'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              </td>
            </tr>
            ';
            $no++;
          }
        }
        ?>
      </table>
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
    header("Location: /Estadias/admin/login.php");
  }
 ?>
