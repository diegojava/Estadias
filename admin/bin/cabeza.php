  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>DM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Panel</b>ADMON</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellidoP'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['nombre'] ?> <?php echo $_SESSION['apellidoP'] ?> - <?php if($_SESSION['cargo'] == "admin") { echo 'Administrador';}?> <?php if($_SESSION['cargo'] == "profesor") { echo 'Profesor';}?>
                   <small>Usuario: <?php echo $_SESSION['id_usuario'] ?></small>
                
                                    <?php
                $usuarioProf = $_SESSION['id_usuario'];
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "dbaprende";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sqlProf = "SELECT escuela.nombre as nombreE 
                FROM escuela, usuarios where usuarios.usuario = '$usuarioProf' 
                and escuela.id = usuarios.idEscuela;";
                $resultProf = $conn->query($sqlProf);

                if ($resultProf->num_rows > 0) {
                    // output data of each row
                    while($row = $resultProf->fetch_assoc()) { ?>

                       <small>Escuela: <?php echo $row['nombreE'] ?></small>
                    <?php }
                } else {
                    echo "error";
                }
                
                ?>

                  
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php $grupo = $_SESSION['grupo']; ?>
                  <a  class="btn btn-default btn-flat"><?php if($_SESSION['cargo'] == "profesor") { echo 'Grupo: 3' . ' ' . $grupo ;}?></a>
                </div>
                <div class="pull-right">
                  <a href="/Estadias/logout.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
          </li>
        </ul>
      </div>
    </nav>
  </header>