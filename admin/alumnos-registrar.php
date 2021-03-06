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
      <h2>Datos del alumno &raquo; Agregar datos</h2>
      
      <?php
      if(isset($_POST['add'])){
        $matricula        = mysqli_real_escape_string($mysqli,(strip_tags($_POST["matricula"],ENT_QUOTES)));//Escanpando caracteres 
        $nombreA         = mysqli_real_escape_string($mysqli,(strip_tags($_POST["nombreA"],ENT_QUOTES)));//Escanpando caracteres 
        $apellidoP  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoP"],ENT_QUOTES)));//Escanpando caracteres 
        $apellidoM  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoM"],ENT_QUOTES)));//Escanpando caracteres 
        $fechaN  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["fechaN"],ENT_QUOTES)));//Escanpando caracteres 
        $grado       = mysqli_real_escape_string($mysqli,(strip_tags($_POST["grado"],ENT_QUOTES)));//Escanpando caracteres 
        $grupo    = mysqli_real_escape_string($mysqli,(strip_tags($_POST["grupo"],ENT_QUOTES)));//Escanpando caracteres 
        $contrasena = mysqli_real_escape_string($mysqli,(strip_tags($_POST["contrasena"],ENT_QUOTES)));//Escanpando caracteres
        $telefono = mysqli_real_escape_string($mysqli,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
        //$escuela    = mysqli_real_escape_string($mysqli,(strip_tags($_POST["escuela"],ENT_QUOTES)));//Escanpando caracteres 
        

        if($_SESSION["cargo"] == "admin"){
        $idEscuela    =  mysqli_real_escape_string($mysqli,(strip_tags($_POST["escuela"],ENT_QUOTES)));  } //Escanpando caracteres 
        else if($_SESSION["cargo"] == "profesor"){
        $idEscuela    =  mysqli_real_escape_string($mysqli,(strip_tags($_POST["escuela1"],ENT_QUOTES)));  } 

        $direccion = mysqli_real_escape_string($mysqli,(strip_tags($_POST["direccion"],ENT_QUOTES)));//Escanpando caracteres

         if($_SESSION["cargo"] == "admin"){
        $idProfesor    =  mysqli_real_escape_string($mysqli,(strip_tags($_POST["profesor"],ENT_QUOTES)));  } //Escanpando caracteres 
        else if($_SESSION["cargo"] == "profesor"){
        $idProfesor    =  mysqli_real_escape_string($mysqli,(strip_tags($_POST["profesor1"],ENT_QUOTES)));  } 
        //$idProfesor  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["profesor"],ENT_QUOTES)));//Escanpando caracteres
        
        //$rol      = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));//Escanpando caracteres 
        
      
 
        $cek = mysqli_query($mysqli, "SELECT * FROM alumno WHERE matricula='$matricula'");

        if(mysqli_num_rows($cek) == 0){
            $insert = mysqli_query($mysqli, "INSERT INTO alumno(matricula, nombre, apellidoP, apellidoM, grado, grupo, contrasena, idEscuela, estatus, fechaN, direccion, idProfesor, telefono)
                              VALUES('$matricula','$nombreA', '$apellidoP', '$apellidoM', '$grado', '$grupo', sha1('$contrasena'),     (Select id from escuela where identificador = '$idEscuela') ,1,'$fechaN','$direccion',$idProfesor, '$telefono')") or die(mysqli_error($mysqli));

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


          <div class="form-group col-xs-8">
                  <label class="control-label" for="inputSuccess">Nombre</label>
                  <input type="text" class="form-control" id="nombreA" name="nombreA" required placeholder="Ingresa Nombre" onkeyup="poner(this.form)">
           </div>

            <div class="form-group col-xs-8">
                <label class="control-label" for="inputSuccess">Apellido Paterno</label>
               <input type="text" class="form-control" id="apellidoP" name="apellidoP" required placeholder="Ingresa Apellido Paterno" onkeyup="poner(this.form)">
            </div>

            <div class="form-group col-xs-8">
                <label class="control-label" for="inputSuccess">Apellido Materno</label>
               <input type="text" class="form-control" id="apellidoM" name="apellidoM" required placeholder="Ingresa Apellido Materno" onkeyup="poner(this.form)">
            </div>

             <div class="form-group col-xs-8">
              <label class="control-label" for="inputSuccess">Fecha de Nacimiento</label>
               
               <input class="form-control" required type="text" name="fechaN" id="fechaN" placeholder="yyyy-mm-dd" onkeyup="poner(this.form);
              var fechaN = this.value;
              if (fechaN.match(/^\d{4}$/) !== null) {
               this.value = fechaN + '-';
              } else if (fechaN.match(/^\d{4}\-\d{2}$/) !== null) {
                this.value = fechaN + '-';
              }" maxlength="10">
            </div>
       

            <div class="form-group col-xs-8">
                <label class="control-label" for="inputSuccess">Dirección</label>
               <input type="text" class="form-control" id="direccion" name="direccion" required placeholder="Ingresa Direccion" onkeyup="poner(this.form)">
            </div>

            <div class="form-group col-xs-8">
                <label class="control-label" for="inputSuccess">Teléfono</label>
               <input type="text" class="form-control" id="telefono" name="telefono" required placeholder="Ingresa Telefono" onkeyup="poner(this.form)">
            </div>

            <!--

            DE LO SIGUIENTE SE ENVIARA AL QUERY
            EL ID DEL PROFESOR

            -->

            <!-- 

              VISTA DE ADMIN PARA ID PROFESOR 

            -->
             <?php  
            if($_SESSION["cargo"] == "admin"){
            $sql="SELECT id, nombre, apellidoP, apellidoM, idEscuela FROM usuarios WHERE cargo ='profesor'"; 
            $consulta=mysqli_query($mysqli,$sql); 
            ?> 

            <div class="form-group col-xs-8">
            <label class="control-label" for="inputSuccess">Profesor</label>
            <select class="form-control" id="profesor" name="profesor" onclick="poner(this.form)"> 
            <?php 
            while($row=mysqli_fetch_array($consulta)) 
            {

            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . ' ' . $row['apellidoP'] . ' ' . $row['apellidoM'] ."</option>"; 
            } 
            //mysqli_close($mysqli); 

            ?>
            </select> 
            </div>
            <?php } ?>

            <!-- 

              VISTA PROFESOR 
              PARA ID PROFESOR 

            -->

            <?php
            $idProf = $_SESSION["id"];
            if($_SESSION["cargo"] == "profesor"){
            $sql="SELECT usuarios.id as id, usuarios.nombre as nombre, usuarios.apellidoP as apellidoP, usuarios.apellidoM as apellidoM, escuela.identificador as identi
            FROM usuarios, escuela
            WHERE usuarios.id = $idProf AND escuela.id = usuarios.idEscuela";
            $consulta=mysqli_query($mysqli,$sql); 
            ?> 
        
           <div class="form-group col-xs-8">
            <label class="control-label" for="inputSuccess">Profesor</label>
            <select class="form-control" id="profesor1" name="profesor1" onclick="poner(this.form)"> 
            <?php 
            while($row=mysqli_fetch_array($consulta))
            {

            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . ' ' . $row['apellidoP'] . "</option>"; 
            } 
            //mysqli_close($mysqli); 

            ?>
            </select> 
            </div>
            <?php } ?>

            <!--

            DE LO SIGUIENTE SE ENVIARA AL QUERY
            EL ID DE LA ESCUELA

            -->

            <?php  
            if($_SESSION["cargo"] == "admin"){
            $sql="SELECT id, identificador as identi, nombre FROM escuela"; 
            $consulta=mysqli_query($mysqli,$sql); 
            ?> 

            <div class="form-group col-xs-8">
            <label class="control-label" for="inputSuccess">Escuela</label>

            <select class="form-control" id="escuela" name="escuela" onclick="poner(this.form)"> 
            <?php 
            while($row=mysqli_fetch_array($consulta)) 
            {

             
            echo "<option value='" . $row['identi'] . "'>" . $row['nombre'] . "</option>"; 
            } 
            //mysqli_close($mysqli); 

            ?>
            </select>
            </div>
            <?php 
            
            } ?>

            <!-- 

            SOLO SE MUESTRA SI ES PROFESOR
            PARA ID DE ESCUELA

             -->

            <?php
            $escuela = $_SESSION["idEscuela"];
            if($_SESSION["cargo"] == "profesor"){
            $sql="SELECT escuela.id as id, escuela.identificador as identi, escuela.nombre as nombre
            FROM escuela,usuarios 
            WHERE usuarios.idEscuela = $escuela 
            and escuela.id = usuarios.idEscuela"; 
            //echo $sql;
            $consulta=mysqli_query($mysqli,$sql); 
            ?> 

            <div class="form-group col-xs-8">
            <label class="control-label" for="inputSuccess">Escuela</label>
            <select class="form-control" id="escuela1" name="escuela1" onclick="poner(this.form)"> 

            <?php 
            while($row=mysqli_fetch_array($consulta)) 
            { 
              //echo "<option>IV</option>";
            echo "<option value='" . $row['identi'] . "'>" . $row['nombre'] . "</option>"; 
            } 
            //mysqli_close($mysqli); 
            ?>

            </select>
            </div>
            <?php } ?>
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

                <div class="form-group col-xs-8">
                <label class="control-label" for="inputSuccess">Grado</label>
               <input value="3" readonly type="text" class="form-control" id="grado" required name="grado" placeholder="Ingresa Grado" onkeyup="poner(this.form)">
                </div>

            <div class="form-group col-xs-8">
               

                

                <!-- 
                  HEEEEYYY 
                --> 

                <?php  
                $grupo = $_SESSION["grupo"];
                if($_SESSION["cargo"] == "profesor"){
                //$sql="SELECT grupo FROM usuarios where usuario = $grupo"; 
                $consulta=mysqli_query($mysqli,$sql); 
                ?> 

                <div class="form-group">
                <label class="control-label" for="inputSuccess">Grupo</label>

                <select class="form-control" id="grupo" name="grupo" onclick="poner(this.form)"> 
                <?php 
                while($row=mysqli_fetch_array($consulta)) 
                {

                 
                echo "<option value='" . $grupo . "'>" . $grupo . "</option>"; 
                } 
                //mysqli_close($mysqli); 

                ?>
                </select>
                </div>
                <?php 
                
                } ?>


                <!-- 
                  HEEEEYYY 
                --> 
                <!--<label class="control-label" for="inputSuccess">Selecciona un grupo:</label>
                <select class="form-control" id="grupo" name="grupo" required onclick="poner(this.form)">
                  <option>A</option>
                  <option>B</option>
                  <option>C</option>
                  <option>D</option>
                </select>-->

            </div>

            <div class="form-group col-xs-8">
            <h3>
             Datos del login
              <small>Con los siguientes datos, los niños podrán ingresar al sistema.</small>
            </h3>
          </div>
            <div class="form-group col-xs-8">
                <label class="control-label" for="inputSuccess">Matricula</label>
               <input class="form-control" type="text" id="matricula" name="matricula" readonly style="text-transform:uppercase">
            </div>

            <div class="form-group col-xs-8">
                <label class="control-label" for="inputSuccess">Contraseña</label>
               <input class="form-control" type="text" id="contrasena" required name="contrasena">
            </div>
              <br>
              <div class="form-group col-xs-8">
               <input type="submit" class="btn btn-success form-control" align="right" value="Registrar" name="add" id="add" />
             </div>
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


<?php if($_SESSION["id_usuario"] == TRUE && $_SESSION["cargo"] == "admin"){ ?>
   <script type="text/javascript">
      function poner(frm) {
         frm.matricula.value = frm.apellidoP.value.substr(0,2) + frm.apellidoM.value.substr(0,1) + frm.nombreA.value.substr(0,1) + frm.fechaN.value.substr(2,2) +  frm.escuela.value.substr()+   frm.grado.value.substr()+ frm.grupo.value.substr();
      }
    </script> <?php } ?>

    <?php if($_SESSION["id_usuario"] == TRUE && $_SESSION["cargo"] == "profesor"){ ?>
   <script type="text/javascript">
      function poner(frm) {
         frm.matricula.value = frm.apellidoP.value.substr(0,2) + frm.apellidoM.value.substr(0,1) + frm.nombreA.value.substr(0,1) +   frm.fechaN.value.substr(2,2) +frm.escuela1.value.substr()+   frm.grado.value.substr()+ frm.grupo.value.substr();
      }
    </script> <?php } ?>
</body>
</html>
<?php
  } else {
    header("Location: /Estadias/admin/login.php");
  }
 ?>
