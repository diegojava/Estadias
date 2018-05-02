<?php include_once("header.php") ?>
<?php require('conexion.php');

	session_start();

	if(isset($_SESSION["id_alumno"])){
		header("Location: index.php");
	}

	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['matricula']);
		$password = mysqli_real_escape_string($mysqli,$_POST['clave']);
		$error = '';

		$sha1_pass = sha1($password);

		$sql = "SELECT * FROM alumno WHERE matricula = '$usuario' AND contrasena = '$sha1_pass'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;

		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['matricula'] = $row['matricula'];
			$_SESSION['id_alumno'] = $row['nombre'];
			//$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['apellidoP'] = $row['apellidoP'];
			$_SESSION['apellidoM'] = $row['apellidoM'];
			$_SESSION['idEscuela'] = $row['idEscuela'];
			$_SESSION['idProfesor'] = $row['idProfesor'];


			header("location: /Estadias/index.php");
			} else {
			$error = "El nombre o contrase&ntildea son incorrectos";
		}
	}
?>
<title>Login - Aprende Jugando</title>
	</div>
	<!-- .bg-level-1 -->
	<div id="kids_middle_container">
		<!-- .content -->
		<div class="kids_top_content">
			<div class="kids_top_content_middle ">
				<div class="header_container ">
					<div class="l-page-width">
						<h1>Inicio de sesión</h1>
						<ul id="breadcrumbs">
							<li><a href="index.php" title="Home">Inicio</a></li> <span class="delimiter">&gt;</span>
							<li><span class="current_crumb">Iniciar sesión</span></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- .kids_top_content_middle -->
		</div>
		<div class="bg-level-2-full-width-container kids_bottom_content">
			<div class="bg-level-2-page-width-container no-padding">
				<section class="kids_bottom_content_container">
					<!-- ***************** - START Image floating - *************** -->
					<div class="page-content">
						<div class="bg-level-2 first-part"></div>
						<div class="container l-page-width">
							<div class="entry-container ">
								<main>
									<div class='grid-row clearfix'>
										<div class='grid-col grid-col-9'>
											<section class='cws-widget'>
												<div class='widget-title'></div>
												<section class='cws_widget_content'>

													<?php
														if(isset($_GET["error"])) {
															echo "<p class='error'>Usuario y / o Contraseña erroneos. Intentelo de nuevo.</p>";
														}
		 											?>

													<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form">
														<br> Matricula: <input type="text" name="matricula" id="matricula" />
														<br> Contraseña: <input type="password" name="clave" id="clave" />
														<br> <input type="submit" name="enviar" value="Entrar">
													</form>
													<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
												</section>
											</section>
										</div>

									</div>
									<!-- comments block -->
									<!-- //end comments block -->
								</main>
								<div class="kids_clear"></div>
							</div>
							<!-- .entry-container -->
						</div>
						<div class="bg-level-2 second-part"></div>
					</div>
					<!-- ***************** - END Image floating - *************** -->
				</section>
				<!-- .bottom_content_container -->
			</div><br><br><br><br><br><br>
			<div class="content_bottom_bg"></div>
		</div>
	
	<!-- .end_content -->
	<!-- FOOTER BEGIN -->
	
			<!-- /wrapper -->
		</div>
		<!--/ l-page-width-->
	</div>
	<!-- .kids_bottom_container -->
	<?php include_once("footer.php") ?>
	<script type='text/javascript' src='js/jquery.min.js'></script>
	<script type='text/javascript' src='js/jquery.easing-1.3.min.js'></script>
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script type='text/javascript' src="js/jquery.form.min.js"></script>
	<script type="text/javascript" src='js/jquery-ui.min.js'></script>
	<script type='text/javascript' src='js/scripts.js'></script>
	<script type='text/javascript' src='js/retina.min.js'></script>
	<script type='text/javascript' src='js/jquery.tweet.js'></script>
	<script src='js/jquery.lavalamp-1.4.min.js'></script>

	<script type='text/javascript' src='js/owl.carousel.js'></script>
	<script type='text/javascript' src='js/jquery.prettyPhoto.js'></script>
	<script type='text/javascript' src='js/jquery.isotope.min.js'></script>

	<script type='text/javascript' src='js/jquery.flexnav.min.js'></script>
</body>
</html>
