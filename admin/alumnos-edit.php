<?php
ob_start();
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
 <?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($mysqli,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($mysqli, "SELECT * FROM alumnos WHERE matricula='$nik'");
			if(mysqli_num_rows($sql) == 0){
				//header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$codigo		     = mysqli_real_escape_string($mysqli,(strip_tags($_POST["matricula"],ENT_QUOTES)));//Escanpando caracteres 
				$nombres		     = mysqli_real_escape_string($mysqli,(strip_tags($_POST["nombreA"],ENT_QUOTES)));//Escanpando caracteres 
				$lugar_nacimiento	 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoP"],ENT_QUOTES)));//Escanpando caracteres 
				$fecha_nacimiento	 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoM"],ENT_QUOTES)));//Escanpando caracteres 
				$direccion	     = mysqli_real_escape_string($mysqli,(strip_tags($_POST["grado"],ENT_QUOTES)));//Escanpando caracteres 
				$telefono		 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["grupo"],ENT_QUOTES)));//Escanpando caracteres 
				$puesto		 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["isActivo"],ENT_QUOTES)));//Escanpando caracteres 
				$estado			 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["rol"],ENT_QUOTES)));//Escanpando caracteres  
				$escuela			 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["escuela"],ENT_QUOTES)));//Escanpando caracteres

				$update = mysqli_query($mysqli, "UPDATE alumnos SET nombreA='$nombres', apellidoP='$lugar_nacimiento', apellidoM='$fecha_nacimiento', grado='$direccion', grupo='$telefono', isActivo='$puesto', rol='$estado', escuela='$escuela' WHERE matricula='$nik'") or die(mysqli_error());
				if($update){
					header("Location: alumnos-edit.php?nik=".$nik."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Matricula</label>
					<div class="col-sm-2">
						<input type="text" name="matricula" value="<?php echo $row ['matricula']; ?>" class="form-control" placeholder="NIK" required readonly>
					</div>
				</div>
				<hr />
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombres</label>
					<div class="col-sm-4">
						<input type="text" name="nombreA" value="<?php echo $row ['nombreA']; ?>" class="form-control" placeholder="Nombres" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellido P.</label>
					<div class="col-sm-4">
						<input type="text" name="apellidoP" value="<?php echo $row ['apellidoP']; ?>" class="form-control" placeholder="Lugar de nacimiento" required>
					</div>
				</div>
					<div class="form-group">
					<label class="col-sm-3 control-label">Apellido M.</label>
					<div class="col-sm-4">
						<input type="text" name="apellidoM" value="<?php echo $row ['apellidoM']; ?>" class="form-control" placeholder="Lugar de nacimiento" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Escuela</label>
					<div class="col-sm-3">
						<select name="escuela" class="form-control">
							<option value="">- Selecciona escuela -</option>
                            <option value="UT" <?php if ($row ['escuela']=="UT"){echo "selected";} ?>>Universidad Tecnólogica</option>
							<option value="BA" <?php if ($row ['escuela']=="BA"){echo "selected";} ?>>Benémerito de las Américas</option>
							<option value="PI" <?php if ($row ['escuela']=="PI"){echo "selected";} ?>>ESPI</option>
							<option value="NH" <?php if ($row ['escuela']=="NH"){echo "selected";} ?>>Niños Héroes</option>
						</select> 
					</div>
                   
                </div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Grado</label>
					<div class="col-sm-3">
						<input type="text" name="grado" value="<?php echo $row ['grado']; ?>" class="form-control" placeholder="Grado" required>
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Grupo</label>
					<div class="col-sm-3">
						<input type="text" name="grupo" value="<?php echo $row ['grupo']; ?>" class="form-control" placeholder="Grupo" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Rol</label>
					<div class="col-sm-3">
						<select name="rol" class="form-control">
							<option value="">- Selecciona rol -</option>
                            <option value="1" <?php if ($row ['rol']==1){echo "selected";} ?>>Alumno</option>
							<option value="2" <?php if ($row ['rol']==2){echo "selected";} ?>>Maestro</option>
							
						</select> 
					</div>
                   
                </div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Estado</label>
					<div class="col-sm-3">
						<select name="isActivo" class="form-control">
							<option value="">- Selecciona estado -</option>
                            <option value="0" <?php if ($row ['isActivo']==0){echo "selected";} ?>>Bloqueado</option>
							<option value="1" <?php if ($row ['isActivo']==1){echo "selected";} ?>>Activo</option>
							
						</select> 
					</div>
                   
                </div>
			
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
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
ob_end_flush();
  } else {
    header("Location: /Estadias/login.php");
  }
 ?>
