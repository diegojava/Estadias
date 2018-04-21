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
        $usuario        = mysqli_real_escape_string($mysqli,(strip_tags($_POST["usuario"],ENT_QUOTES)));//Escanpando caracteres 
        $nombre         = mysqli_real_escape_string($mysqli,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
        $apellidoP  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoP"],ENT_QUOTES)));//Escanpando caracteres 
        $apellidoM  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoM"],ENT_QUOTES)));//Escanpando caracteres 
        $direccion       = mysqli_real_escape_string($mysqli,(strip_tags($_POST["direccion"],ENT_QUOTES)));//Escanpando caracteres 
        $telefono    = mysqli_real_escape_string($mysqli,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
        $correo    = mysqli_real_escape_string($mysqli,(strip_tags($_POST["correo"],ENT_QUOTES)));//Escanpando caracteres 
        $contrasena = mysqli_real_escape_string($mysqli,(strip_tags($_POST["contrasena"],ENT_QUOTES)));//Escanpando caracteres 
        $idEscuela    = mysqli_real_escape_string($mysqli,(strip_tags($_POST["escuela"],ENT_QUOTES)));//Escanpando caracteres 
        
        //$rol      = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));//Escanpando caracteres 
        
        $cek = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE usuario='$usuario'");

        if(mysqli_num_rows($cek) == 0){
            $insert = mysqli_query($mysqli, "
              INSERT INTO usuarios(usuario, nombre, apellidoP, apellidoM, telefono, direccion, correo, contrasena, idEscuela, cargo) 
                          VALUES('$usuario','$nombre', '$apellidoP', '$apellidoM', '$telefono', '$direccion', '$correo', sha1('$contrasena'), (Select id from escuela where identificador = '$idEscuela'),'profesor')") or die(mysqli_error($mysqli));

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
                  <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Ingresa Nombre" onkeyup="poner(this.form)">
           </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Apellido Paterno</label>
               <input type="text" class="form-control" id="apellidoP" name="apellidoP" required placeholder="Ingresa Apellido Paterno" onkeyup="poner(this.form)">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Apellido Materno</label>
               <input type="text" class="form-control" id="apellidoM" name="apellidoM" required placeholder="Ingresa Apellido Materno" onkeyup="poner(this.form)">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Dirección</label>
               <input type="text" class="form-control" id="direccion" name="direccion" required placeholder="Ingresa Direccion" onkeyup="poner(this.form)">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Teléfono</label>
               <input type="text" class="form-control" id="telefono" name="telefono" required placeholder="Ingresa Telefono" onkeyup="poner(this.form)">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Correo</label>
               <input type="text" class="form-control" id="correo" name="correo" required placeholder="Ingresa Correo" onkeyup="poner(this.form)">
            </div>


            <?php  

            $sql="SELECT id, identificador as identi, nombre FROM escuela"; 
            $consulta=mysqli_query($mysqli,$sql); 

            ?> 
            <div class="form-group">
            <label class="control-label" for="inputSuccess">Escuela</label>
            <select class="form-control" id="escuela" name="escuela" onclick="poner(this.form)"> 
            <?php 
            while($row=mysqli_fetch_array($consulta)) 
            {

            echo "<option value='" . $row['identi'] . "'>" . $row['nombre'] . "</option>"; 
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

            
            <h3>
             Datos del login
              <small>Con los siguientes datos, los profesores podrán ingresar al sistema.</small>
            </h3>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Usuario</label>
               <input class="form-control" type="text" id="usuario" name="usuario">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess">Contraseña</label>
               <input class="form-control" type="text" id="contrasena" required name="contrasena">
            </div>
              <br>
               <input type="submit" class="btn btn-success form-control" align="right" value="Registrar" name="add" id="add" />
              </form>
              <br>
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
