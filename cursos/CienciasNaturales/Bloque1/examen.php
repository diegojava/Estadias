
	<title>Ciencias Naturales &#8211; ¿Cómo mantener la salud?</title>
<?php
		session_start();
		include("$_SERVER[DOCUMENT_ROOT]/Estadias/admin/bin/conexion.php");
		$matricula = $_SESSION['matricula'];
		$nombre = $_SESSION['id_alumno'];
		$apellidoP = $_SESSION['apellidoP'];


		if($_SESSION["matricula"] == TRUE)
  {

?>
<?php include_once("$_SERVER[DOCUMENT_ROOT]/Estadias/header.php") ?>
	</div>
	<!-- .bg-level-1 -->
	<div id="kids_middle_container">
		<!-- .content -->
		<div class="kids_top_content">
			<div class="kids_top_content_middle ">
				<div class="header_container ">
					<div class="l-page-width">
						<br>
						<p style="float:right"><?php echo "Matricula: " . $matricula;
							echo "<br>Nombre: " . $nombre . ' ' . $apellidoP; ?>
							<br> Ciencias Naturales - Bloque #1 </p>
						<h1>Ciencias Naturales: ¿Cómo mantener la salud?</h1> 
							
						<br>

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
								
								<div hidden="hidden" class="countdown"><span class="time_left">12s</span></div>
								<div hidden="hidden" class="points"><span class="points">0 points</span></div>
									<div class='grid-row clearfix' style='margin-top:0px;'>
										<div class='grid-col grid-col-12'>
											<section class='cws-widget'>
												<section class='cws_widget_content'>
													

				<?php if(!isset($_GET['puntuacion'])){ ?>
				<div class="start">
				      <div class="card">
				        <p>¿Listo para comenzar?</p><br>
				        <p style="font-size:18px">En la siguiente evaluación tendrás que contestar correctamente acerca del primer bloque de Ciencias Naturales, si aún no estás listo, sigue repasando.</p><br>
				        <button class="start">Comenzar</button>
				      </div>
				    </div> <?php } 
				    if(isset($_GET['puntuacion'])){ ?>
				    <div class="start">
				      <div class="card">
				        <p>Terminar prueba</p>
				         <form method="post" action="" NAME="terminar" enctype="multipart/form-data">
				        <input type="submit" value="OK" name="terminar" id="terminar">
				    	</form>
				       <!-- <div <?php // if(!isset($_GET['puntuacion'])) echo "hidden='hidden'" ?> class="terminar">
				       	<button onclick="msg()">OK</button></div> -->
				      </div>
				    </div> <?php } ?>

				    <div class="play">
				      <div class="questions"></div>
				    </div>
				    <div class="finish card">
				      <p class="times_up">¡Se acabó el tiempo!</p>
				      <p>Has terminado !</p>
				      <p class="final_points">8 puntos</p>
				      <div class="play_again">
				        <button>Volver a jugar</button>
				      </div>
				    </div>
				
    			<?php 
    			if(isset($_GET['puntuacion']))
    			$puntos = $_GET['puntuacion']; 

    			?>
				
				<div <?php if(!isset($_GET['puntuacion'])) echo "hidden='hidden'" ?> class="terminar"><button name="terminar" id="terminar" onclick="msg()">
				Terminar</button></div>
				<script>
					
					function msg(){
						alert(<?php echo "$puntos" ?>)
						//window.location.href = "examen-1.php";
					}

				</script>
				
								</section>
							</section>


		<?php
		$fecha = date("Y-m-d H:i:s");
     	 if(isset($_POST['terminar'])){
      	$puntuacion = $_GET['puntuacion']; 
        //$matricula        = mysqli_real_escape_string($mysqli,(strip_tags($_POST["matricula"],ENT_QUOTES)));//Escanpando caracteres 
       // $nombreA         = mysqli_real_escape_string($mysqli,(strip_tags($_POST["nombreA"],ENT_QUOTES)));//Escanpando caracteres 
       // $apellidoP  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoP"],ENT_QUOTES)));//Escanpando caracteres 
        //$apellidoM  = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellidoM"],ENT_QUOTES)));//Escanpando caracteres 
 
        //$cek = mysqli_query($mysqli, "SELECT * FROM alumno WHERE matricula='$matricula'");

       // if(mysqli_num_rows($cek) == 0){
            $insert = mysqli_query($mysqli, "INSERT INTO avance(idmateria, matricula, puntuacion, fecha,bloque)
            VALUES(3,'$matricula', $puntuacion, '$fecha',1)") or die(mysqli_error($mysqli));

            if($insert){
              
              echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
              
				?> <script>window.location.href = "/Estadias/index.php";</script> <?php

            }else{
              
              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
            }
           
        //}
       
      }
      ?>


											
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
	<?php include_once("$_SERVER[DOCUMENT_ROOT]/Estadias/footer.php") ?>
	<!-- 	<script type='text/javascript' src='../estilos/js/jquery.min.js'></script>-->	
	<!-- <script type="text/javascript" src='../estilos/js/jquery-ui.min.js'></script> -->
	<!-- <script type='text/javascript' src='../estilos/js/scripts.js'></script> -->
	<!-- <script type='text/javascript' src='../estilos/js/retina.min.js'></script> -->
	<!-- <script type='text/javascript' src='../estilos/js/jquery.tweet.js'></script> -->
<!-- 	<script type='text/javascript' src='../estilos/js/jquery.easing-1.3.min.js'></script> -->
	<script type='text/javascript' src='../estilos/js/owl.carousel.js'></script>
	<script type='text/javascript' src='../estilos/js/jquery.isotope.min.js'></script>
	<script type='text/javascript' src='../estilos/js/jquery.flexnav.min.js'></script>
	<script type='text/javascript' src='../estilos/js/jquery.prettyPhoto.js'></script>
	<script src="../estilos/js/jquery-2.2.0.min.js"></script>
    <script src="../estilos/js/underscore-1.8.3.min.js"></script>
    <script type="text/javascript" src="../estilos/js/quizzer-cn.js"></script>
    	<link rel="alternate" type="application/rss+xml" title=" &raquo; Comments Feed" href="#" />
	<link rel="shortcut icon" href="../estilos/images/favicon.png">
	<link rel="stylesheet" href="../estilos/css/font-awesome.css">
<!-- 	<link rel="stylesheet" type="text/css" href="../estilos/css/styles.css" />
	<link rel="stylesheet" type="text/css" href="../estilos/css/flexnav.css" />
	<link rel="stylesheet" type="text/css" href="../estilos/css/prettyPhoto.css" /> -->
	<link rel="stylesheet" type="text/css" href="../estilos/css/Ayuda.css">
	<link href="../estilos/css/quizzer.css" type="text/css" rel="stylesheet">
</body>
</html>
<?php }  else { ?> <script>javascript:history.back(alert("Por favor, inicia sesión."));</script> <?php } ?>
