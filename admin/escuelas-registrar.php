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
      <h2>Datos del alumno &raquo; Agregar datos</h2>
      
      <?php
      if(isset($_POST['add'])){
        //$matricula        = mysqli_real_escape_string($mysqli,(strip_tags($_POST["matricula"],ENT_QUOTES)));//Escanpando caracteres 
        //$nombreA         = mysqli_real_escape_string($mysqli,(strip_tags($_POST["nombreA"],ENT_QUOTES)));//Escanpando caracteres 
        //$apellidoP  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoP"],ENT_QUOTES)));//Escanpando caracteres 
        //$apellidoM  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoM"],ENT_QUOTES)));//Escanpando caracteres 
        $nombre       = mysqli_real_escape_string($mysqli,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
        $direccion    = mysqli_real_escape_string($mysqli,(strip_tags($_POST["direccion"],ENT_QUOTES)));//Escanpando caracteres 
        $telefono = mysqli_real_escape_string($mysqli,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
        $director    = mysqli_real_escape_string($mysqli,(strip_tags($_POST["director"],ENT_QUOTES)));//Escanpando caracteres 
        //$rol      = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));//Escanpando caracteres 
        
      
 
        $cek = mysqli_query($mysqli, "SELECT * FROM escuela WHERE nombre='$nombre'");
        if(mysqli_num_rows($cek) == 0){
            $insert = mysqli_query($mysqli, "INSERT INTO escuela(nombre, direccion, telefono, director)
                              VALUES('$nombre','$direccion', '$telefono', '$director')") or die(mysqli_error($mysqli));
            if($insert){
              echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
            }else{
              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
            }
           
        }else{
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código exite!</div>';
        }
      }
      ?>
 
             <form method="post" action="" NAME="add" enctype="multipart/form-data">


          <div class="form-group">
                  <label class="control-label" for="inputSuccess">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre de la escuela" onkeyup="poner(this.form)">
           </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Direccion</label>
               <input type="text" class="form-control" id="direccion" name="direccion" required placeholder="Direccion de la escuela" onkeyup="poner(this.form)">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Telefono</label>
               <input type="text" class="form-control" id="telefono" name="telefono" required placeholder="Telefono de la escuela" onkeyup="poner(this.form)">
            </div>

                <div class="form-group">
                <label class="control-label" for="inputSuccess">Director</label>
               <input type="text" class="form-control" id="director" required name="director" placeholder="Nombre de director de la escuela" onkeyup="poner(this.form)">
                </div>
           
              <br>
               <input type="submit" class="btn btn-success" align="right" value="Registrar" name="add" id="add" />
              </form>
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
