<?php require('bin/conexion.php');

  session_start();

  if(isset($_SESSION["id_usuario"])){
    header("Location: /Estadias/admin/");
  }
  
  if(isset($_SESSION['matricula'])){
    header("Location: /Estadias");
  }
  

  if(!empty($_POST))
  {
    $usuario = mysqli_real_escape_string($mysqli,$_POST['matricula']);
    $password = mysqli_real_escape_string($mysqli,$_POST['clave']);
    $error = '';

    $sha1_pass = sha1($password);

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$sha1_pass'";
    $result=$mysqli->query($sql);
    $rows = $result->num_rows;

    if($rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['id'] = $row['id'];
      $_SESSION['id_usuario'] = $row['usuario'];
      $_SESSION['nombre'] = $row['nombre'];
      $_SESSION['apellidoP'] = $row['apellidoP'];
      $_SESSION['correo'] = $row['correo'];
      $_SESSION['cargo'] = $row['cargo'];
      $_SESSION['idEscuela'] = $row['idEscuela'];

      header("location: /Estadias/admin");
      } else {
      $error = "El nombre o contrase&ntildea son incorrectos";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inicio de Sesión | Administración</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresa tus datos...</p>

  <?php
  if(isset($_GET["error"])) {
    echo "<p class='error'>Usuario y / o Contraseña erroneos. Intentelo de nuevo.</p>";
  }
  ?>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="matricula" id="matricula">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="clave" id="clave">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <input type="submit" name="enviar" class="btn btn-primary btn-block btn-flat" value="Iniciar sesión">
        </div>
        <!-- /.col -->
      </div>
    </form>
    <p>
    <center><div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div></center>

    
    <!-- /.social-auth-links -->

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
