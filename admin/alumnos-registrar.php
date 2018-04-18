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
        $matricula        = mysqli_real_escape_string($mysqli,(strip_tags($_POST["matricula"],ENT_QUOTES)));//Escanpando caracteres 
        $nombreA         = mysqli_real_escape_string($mysqli,(strip_tags($_POST["nombreA"],ENT_QUOTES)));//Escanpando caracteres 
        $apellidoP  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoP"],ENT_QUOTES)));//Escanpando caracteres 
        $apellidoM  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoM"],ENT_QUOTES)));//Escanpando caracteres 
        $grado       = mysqli_real_escape_string($mysqli,(strip_tags($_POST["grado"],ENT_QUOTES)));//Escanpando caracteres 
        $grupo    = mysqli_real_escape_string($mysqli,(strip_tags($_POST["grupo"],ENT_QUOTES)));//Escanpando caracteres 
        $contrasena = mysqli_real_escape_string($mysqli,(strip_tags($_POST["contrasena"],ENT_QUOTES)));//Escanpando caracteres 
        //$escuela    = mysqli_real_escape_string($mysqli,(strip_tags($_POST["escuela"],ENT_QUOTES)));//Escanpando caracteres 
        $idEscuela    = mysqli_real_escape_string($mysqli,(strip_tags($_POST["escuela"],ENT_QUOTES)));//Escanpando caracteres 
        
        //$rol      = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));//Escanpando caracteres 
        
      
 
        $cek = mysqli_query($mysqli, "SELECT * FROM alumno WHERE matricula='$matricula'");
        if(mysqli_num_rows($cek) == 0){
            $insert = mysqli_query($mysqli, "INSERT INTO alumno(matricula, nombre, apellidoP, apellidoM, grado, grupo, contrasena, idEscuela, estatus)
                              VALUES('$matricula','$nombreA', '$apellidoP', '$apellidoM', '$grado', '$grupo', sha1('$contrasena'),$idEscuela ,1)") or die(mysqli_error($mysqli));
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
                  <input type="text" class="form-control" id="nombreA" name="nombreA" required placeholder="Ingresa Nombre" onkeyup="poner(this.form)">
           </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Apellido Paterno</label>
               <input type="text" class="form-control" id="apellidoP" name="apellidoP" required placeholder="Ingresa Apellido Paterno" onkeyup="poner(this.form)">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Apellido Materno</label>
               <input type="text" class="form-control" id="apellidoM" name="apellidoM" required placeholder="Ingresa Apellido Materno" onkeyup="poner(this.form)">
            </div>


            <?php  

            $sql="SELECT id, nombre FROM escuela"; 
            $consulta=mysqli_query($mysqli,$sql); 

            ?> 
            <div class="form-group">
            <label class="control-label" for="inputSuccess">Escuela</label>
            <select class="form-control" id="escuela" name="escuela" onclick="poner(this.form)"> 
            <?php 
            while($row=mysqli_fetch_array($consulta)) 
            { 
            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>"; 
            } 
            mysqli_close($mysqli); 

            ?>
            </select> 
            </div>
            <!--<div class="form-group">
                <label class="control-label" for="inputSuccess">Escuela</label>
                <br>
                <select class="form-control" id="escuela" name="escuela" onclick="poner(this.form)">
                  <option value="">Selecciona una escuela</option>
                  <option value="UT">Universidad Tecnológica</option>
                  <option value="NH">Esc. Niños Héroes</option>
                  <option value="BA">Benémerito de las Américas</option>
                  <option value="PI">ESPI</option>
                </select>
                </div>-->

                <div class="form-group">
                <label class="control-label" for="inputSuccess">Grado</label>
               <input type="text" class="form-control" id="grado" required name="grado" placeholder="Ingresa Grado" onkeyup="poner(this.form)">
                </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Grupo</label>
               <input type="text" class="form-control" id="grupo" required name="grupo" placeholder="Ingresa Grupo" onkeyup="poner(this.form)">
            </div>
            <h3>
             Datos del login
              <small>Con los siguientes datos, los niños podrán ingresar al sistema.</small>
            </h3>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Matricula</label>
               <input class="form-control" type="text" id="matricula" name="matricula" readonly style="text-transform:uppercase">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Contraseña</label>
               <input class="form-control" type="text" id="contrasena" required name="contrasena">
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
   <script type="text/javascript">
      function poner(frm) {
         frm.matricula.value = frm.nombreA.value.substr(0,1) + frm.apellidoP.value.substr(0,1) + frm.apellidoM.value.substr(0,1) + frm.escuela.value.substr()+ frm.grado.value.substr()+ frm.grupo.value.substr();
      }
    </script>
</body>
</html>
<?php
  } else {
    header("Location: /Estadias/login.php");
  }
 ?>
