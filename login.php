<?php include_once("header.php") ?>
<?php require('conexion.php');

	session_start();

	if(isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}

	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['matricula']);
		$password = mysqli_real_escape_string($mysqli,$_POST['clave']);
		$error = '';

		$sha1_pass = sha1($password);

		$sql = "SELECT * FROM administrador WHERE usuario = '$usuario' AND contrasena = '$sha1_pass'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;

		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['usuario'];
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['apellidoP'] = $row['apellidoP'];
			$_SESSION['correo'] = $row['correo'];
			$_SESSION['cargo'] = $row['cargo'];

			header("location: /Estadias/admin");
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
			</div>
			<div class="content_bottom_bg"></div>
		</div>
	</div>
	<!-- .end_content -->
	<!-- FOOTER BEGIN -->
	<div class="kids_bottom_container footer">
		<div class="l-page-width">
			<div class="wrapper">
				<div class="widget widget_text">
					<div class="textwidget">
						<div class='shortcode_carousel' data-carousel-column="1">
							<div class='carousel_header clearfix'>
								<div class='widget-title'>Gallery</div>
							</div>
							<div class='carousel_content'>
								<!-- see gallery_shortcode() -->
								<div id='ngallery-1' class='ngallery clearfix column-1'>
									<dl class='gallery-item'>
										<dt class='gallery-icon '>
											<div class='content-wrapper'>
												<figure>
													<a href="pic/HappyFeet_1st4.jpg" data-rel="prettyPhoto[12135]" class="prettyPhoto kids_picture">
														<img src="pic/300x300-img-4.jpg" alt="" />
													</a>
												</figure>
											</div>
										</dt>
									</dl>
									<dl class='gallery-item'>
										<dt class='gallery-icon'>
											<div class='content-wrapper'>
												<figure>
													<a href="pic/Tangled_3rd5.jpg" data-rel="prettyPhoto[12135]" class="prettyPhoto kids_picture">
														<img src="pic/300x300-img-12.jpg" alt="" />
													</a>
												</figure>
											</div>
										</dt>
									</dl>
									<dl class='gallery-item'>
										<dt class='gallery-icon '>
											<div class='content-wrapper'>
												<figure>
													<a href="pic/LegoMovie_3rd4.jpg" data-rel="prettyPhoto[12135]" class="prettyPhoto kids_picture">
														<img src="pic/300x300-img-9.jpg" alt="" />
													</a>
												</figure>
											</div>
										</dt>
									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="widget widget_cws_tweets">
					<div class="cws-widget-content">
						<!-- twitter header -->
						<div class='carousel_header clearfix'>
							<div class='widget_carousel_nav'>
								<i class='prev fa fa-angle-left'></i>
								<i class='next fa fa-angle-right'></i>
							</div>
							<h3 class="widget-title">Twitter</h3>
						</div>
						<!-- / twitter header -->
						<!-- twitter carousel -->
						<div class="twitter-carousel carousel latest_tweets"></div>
						<!--/twitter carousel -->
					</div>
				</div>
				<div class="widget widget_cws_latest_posts">
					<div class="latest-posts-widget">
						<h3 class="widget-title">Latest Posts</h3>
						<div class="widget-content">
							<ul>
								<li>
									<div class="kids_image_wrapper ">
										<a href="pic/HappyFeet_1st4.jpg" class="prettyPhoto kids_mini_picture" data-rel="prettyPhoto[rpwt]">
											<img src="pic/70x70-img-1.jpg" width="70" height="70" alt=""></a>
									</div>
									<div class="kids_post_content">
										<h4><a href="#">Image Post</a></h4>
										<p>Lorem ipsum dolor ...</p>
										<p class="time-post">January 3, 2015</p>
									</div>
								</li>
								<li>
									<div class="kids_image_wrapper ">
										<a href="pic/LegoMovie_3rd4.jpg" class="prettyPhoto kids_mini_picture" data-rel="prettyPhoto[rpwt]">
											<img src="pic/70x70-img-2.jpg" width="70" height="70" alt=""></a>
									</div>
									<div class="kids_post_content">
										<h4><a href="#">Image Post</a></h4>
										<p>Lorem ipsum dolor ...</p>
										<p class="time-post">January 2, 2015</p>
									</div>
								</li>
								<li>
									<div class="kids_image_wrapper ">
										<a href="pic/Tangled_3rd5.jpg" class="prettyPhoto kids_mini_picture" data-rel="prettyPhoto[rpwt]">
											<img src="pic/70x70-img-3.jpg" width="70" height="70" alt="">
										</a>
									</div>
									<div class="kids_post_content">
										<h4><a href="#">Video blog post</a></h4>
										<p>Lorem ipsum dolor ...</p>
										<p class="time-post">January 1, 2015</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="widget widget_calendar">
					<h3 class="widget-title">Calendar</h3>
					<div id="calendar_wrap">

					</div>
				</div>
			</div>
			<!-- /wrapper -->
		</div>
		<!--/ l-page-width-->
	</div>
	<!-- .kids_bottom_container -->
	<div class="kids-footer-copyrights footer">
		<div class="l-page-width  clearfix">
			<div class="wrapper">
				<ul class="kids_social">
					<li><a href="https://plus.google.com/115553712051048113965" title="Google Plus" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a><span style="background-color:#dd4b39;"></span></li>
					<li><a href="https://www.facebook.com/CreaWS" title="Facebook" target="_blank"><i class="fa fa-facebook fa-2x"></i></a><span style="background-color:#3b5998;"></span></li>
					<li><a href="https://www.youtube.com/user/cwsvideotuts" title="Youtube" target="_blank"><i class="fa fa-youtube-play fa-2x"></i></a><span style="background-color:#b31217;"></span></li>
					<li><a href="https://twitter.com/Creative_WS" title="Twitter" target="_blank"><i class="fa fa-twitter fa-2x"></i></a><span style="background-color:#4099ff;"></span></li>
					<li class="lang_bar">
						<div id="lang_sel">
							<ul>
								<li>
									<a href="#" class="lang_sel_sel icl-en"><img class="iclflag" src="images/en.png" alt="en" title="English" /> &nbsp;
									</a>
									<ul>
										<li class="icl-fr">
											<a href="#"><img class="iclflag" src="images/fr.png" alt="fr" title="Français" />&nbsp;</a>
										</li>
										<li class="icl-de">
											<a href="#"><img class="iclflag" src="images/de.png" alt="de" title="Deutsch" />&nbsp;</a>
										</li>
										<li class="icl-it">
											<a href="#"><img class="iclflag" src="images/it.png" alt="it" title="Italiano" />&nbsp;</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</li>
				</ul>
				<div class="widget widget_text">
					<div class="textwidget">Derechos Reservados @2018: Universidad Tecnológica de la Región Norte de Guerrero</div>
				</div>
			</div>
		</div>
		<div class="dark-mask"></div>
	</div>
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
