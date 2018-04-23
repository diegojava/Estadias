<?php
		session_start();
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
						<h1>Ciencias Naturales - 3er Grado de Primaria</h1>
						<ul id="breadcrumbs">
							<li><a href="index.html" title="Home">Inicio</a></li> <span class="delimiter">&gt;</span>
							<li><span class="current_crumb">Ciencias Naturales</span></li>
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
									<p><b>Tema #1 Movimientos del Cuerpo y Prevención de lesiones</b></p>
									<div class='grid-row clearfix' style='margin-bottom:0px;'>
										<div class='grid-col grid-col-12'>
											<section class='cws-widget'>
												<section class='cws_widget_content'>
													
													<script src="/Estadias/cursos/dist/mysqlwslib.js"></script>

<?php $matricula = $_SESSION["matricula"];  ?>
<script>
var matriculajs = "<?php echo $matricula; ?>";
document.write("Tu matricula es = " + matriculajs);
</script>
<script language="JavaScript">



<!--
alert("Bienvenido a la Autoevaluación correspondiente al primer bloque de Ciencias Naturales \n\nSelecciona las respuestas que crea correctas, teniendo en "+
      "\ncuenta las siguientes consideraciones \n\n1. Los aciertos tienen el valor de un punto"+
	  " \n\n2. Las respuestas no contestadas ni suman ni restan puntos.") 
//-->

var resp = new Array;
var faite = new Array;
var score = 0;

resp[1] = "a";
resp[2] = "b";
resp[3] = "c";
resp[4] = "b";
resp[5] = "c";
resp[6] = "c";
resp[7] = "b";
resp[8] = "c";
resp[9] = "b";
resp[10] = "a";

function Engine(question, repose) 
{
   if (repose != resp[question])
	 {
             if (!faite[question])
			        {faite[question] = -1;}
                }
        else {

                if (!faite[question]) {
                        faite[question] = -1;
                        score++;
                        alert("¡Correcto! Tu puntuación es : " + score );
                        }

                }
}

function Nivel () {
      			
        if (score >= 9 && score < 10) {
                alert(score + "/10 " + "Muy bien, prueba a superarlo");
                var n = mysql_update_query("INSERT INTO avance VALUES (3, matriculajs, 1,0)");
				if (n[0] != 1) {
   				alert("Error");
				}
                }
        if (score >= 7 && score < 8) {
                alert(score + "/10 " + "Bien, pero puedes hacerlo mejor");
                 var n = mysql_update_query("INSERT INTO avance VALUES (3, matriculajs, 1,0)");
				if (n[0] != 1) {
   				alert("Error");
				}
                }
        if (score >= 5 && score < 6) {
                alert(score + "/10 " + "Bien, pero puedes hacerlo mejor");
                 var n = mysql_update_query("INSERT INTO avance VALUES (3, matriculajs, 1,0)");
				if (n[0] != 1) {
   				alert("Error");
				}
                }
        if (score >= 3 && score < 4) {
                alert(score + "/10 " + "Bien, pero puedes hacerlo mejor");
                var n = mysql_update_query("INSERT INTO avance VALUES (3, matriculajs, 1,0)");
				if (n[0] != 1) {
   				alert("Error");
				}
                }
        if (score <= 2) {
                alert("Intenta repasar con ayuda de tus padres o profesor");
                
               	
				
				
}

function enviar()
					{
						// Esta es la variable que vamos a pasar
						var miVariableJS=$("#texto").val();
				 
						// Enviamos la variable de javascript a archivo.php
						$.post("/Estadias/cursos/proceso.php",{"texto":miVariableJS},function(respuesta){
							alert(respuesta);
						});
					}
	

                }

</script>
</head>



<body bgcolor="#FFFFFF" text="#000000">
<table width="785" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#336699" height="2">
  <tr> 
    <td width="50" rowspan="2"><img src="../../imagen/desafio.gif" width="50" height="50"></td>
    <td width="515" class="TopicTitle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#336699"><b>Test 
      de Autoevaluación</b></font></td>
  </tr>
  <tr> 
    <td width="515" bgcolor="#336699"> </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td> </td>
    <td class="TopicSubtitle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#336699">Bloque #1 - Movimientos del cuerpo y prevención de lesiones </font></td>
  </tr>
  <tr> 
    <td height="521"> </td>
    <td height="521"> 
      <div align="center">
<div align="left">
<FORM NAME="formulario" ACTION="">
            <p><font face="Verdana, Arial, Helvetica, sans-serif" size="2">1. 
              Al realizar cualquier actividad que necesite de un movimiento corporal, ¿estamos utilizando el...?</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=1 onClick="Engine(1, this.value)" type=radio value=a>
              a. Aparato locomotor.</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=1 onClick="Engine(1, this.value)" type=radio value=b>
              b. Sistema óseo.</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=1 onClick="Engine(1, this.value)" type=radio value=c>
              c. Articulaciones.</font></p>
            <p><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><br>
              2. ¿Cuántos huesos tiene una persona adulta?</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=2 onClick="Engine(2, this.value)" type=radio value=a>
              a. 450.</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=2 onClick="Engine(2, this.value)" type=radio value=b>
              b. 206.</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=2 onClick="Engine(2, this.value)" type=radio value=c>
              c. 177.</font></p>
            <p><font face="Verdana, Arial, Helvetica, sans-serif" size="2">3. 
              ¿La salida y el estado de un circuito de lógica secuencial 
              depende del estado anterior y de?</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=3 onClick="Engine(3, this.value)" type=radio value=a>
              a. De los conjuntos actuales de combinaciones.</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=3 onClick="Engine(3, this.value)" type=radio value=b>
              b. De los conjuntos actuales de secuencias.</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=3 onClick="Engine(3, this.value)" type=radio value=c>
              c. De los conjuntos actuales de entradas.</font></p>
            <p> </p>
            <p><font face="Verdana, Arial, Helvetica, sans-serif" size="2">4. 
              ¿El funcionamiento de la computadora puede simularse por medio de?</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=4 onClick="Engine(4, this.value)" type=radio value=a>
              a. Un modelo estructurado.</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=4 onClick="Engine(4, this.value)" type=radio value=b>
              b. Un modelo simple.</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=4 onClick="Engine(4, this.value)" type=radio value=c>
              c. Un diagrama de procesos.</font></p>
            <p> </p>
            <p><font face="Verdana, Arial, Helvetica, sans-serif" size="2">6. 
              ¿Los pasos del Pequeño Hombre reflejan? </font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=5 onClick="Engine(5, this.value)" type=radio value=a>
              a. Los de una unidad de CD-ROM.</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=5 onClick="Engine(5, this.value)" type=radio value=b>
              b. Los de una unidad de disco.</font></p>
            <p> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
              <input name=5 onClick="Engine(5, this.value)" type=radio value=c>
              c. Los de una unidad central de procesamiento (CPU).</font></p>
            <p></p>
            <p> 
              <input name=Resulta onClick=Nivel() type=button value=Resultados>
             <input type="text" id="texto">
		<input type="button" value="Enviar variable a PHP" onclick="enviar()">
              <input type="button" name="repose" value="Respuestas Correctas"
	             onClick="alert('reposes Correctas \n\n 1A  6A  11B\n\n 2B  7B  12A\n\n 3B  8A  13B\n\n 4C  9A  14C\n\n 5B 10C  15C')">
              <input type="reset" value="Borrar resultados" name="reset">
            </p>
            <p><font face="Verdana, Arial, Helvetica, sans-serif" size="2">* Para 
              tomar nuevamente la autoevaluación presione el botón 
              'F5' </font></p>
            </FORM> 



            
  </div>
      </div>
    </td>
  </tr>
</table>
<p> </p>
												</section>
											</section>
										</div>


										<div class='grid-col grid-col-6'>
											<section class='cws-widget'>
												<section class='cws_widget_content'>

													
													<p><b>El aparato locomotor:</b></p>
													<p>En tu vida diaria realizas un gran numero de actividades que involucran movimiento corporal, por ejemplo: jugar un partido de fútbol con tus amigos.</p>
													<p><b>El aparato óseo:</b></p>
													<p>El esqueleto forma parte del cuerpo de los humanos y algunos animales, está formado por huesos, y son las estructuras más duras de nuestro cuerpo.</p>
													<p>El esqueleto de un adulto tiene 206 huesos y el de un recién nacido 270.</p>
													<p><b>Nuestros puntos flexibles: las articulaciones</b></p>
													<p>Los puntos donde se unen los huesos se conocen como articulaciones. En ellas encontramos los ligamentos. Los huesos, articulaciones, cartílagos y ligamentos forman lo que conocemos como sistema o aparato óseo.</p>
													
												</section>
											</section>
										</div>
									</div>
									<hr>
									<div class='grid-col grid-col-6'>
											<section class='cws-widget'>
												<section class='cws_widget_content'>
													<p>
														Prevención de lesiones
														<video width="100%" height="100%" controls>
														    <source src="material/bloque1-tema1.2.mp4" type="video/mp4">
														</video>
													</p>
												</section>
											</section>
										</div>
									
										<div class='grid-col grid-col-6'>
											<section class='cws-widget'>
												<section class='cws_widget_content'>
													
													<p>Ut blandit pharetra velit ut congue. Fusce elementum, ante ac ultricies fringilla, augue metus tincidunt velit, sit amet venenatis elit orci quis enim. Mauris auctor sapien orci. Aliquam ornare quam eu nunc accumsan laoreet. Vivamus aliquet nibh in erat ornare eget luctus sem feugiat. Vivamus ut ligula lectus. Fusce dapibus, libero in tempor condimentum, ligula tellus adipiscing risus, vitae lacinia mi lectus sit amet ante.</p>
													<p>
														<iframe src="//player.vimeo.com/video/46630282" width="896" height="504" frameborder="0" title="The Visionaries HD Trailer" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
													</p>
												</section>
											</section>
											<center><a href='examen-tema1.php' class='cws_button '>Ir a las actividades</a></center>
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

						<div class="widget widget_cws_latest_posts">
							<div class="latest-posts-widget">
								<h3 class="widget-title">Español</h3>
								<div class="widget-content">
									<ul>
										<li>
											<div class="kids_image_wrapper ">
												<a href="/Estadias/pic/HappyFeet_1st4.jpg" class="prettyPhoto kids_mini_picture" data-rel="prettyPhoto[rpwt]">
													<img src="/Estadias/pic/70x70-img-1.jpg" width="70" height="70" alt=""></a>
											</div>
											<div class="kids_post_content">
												<h4><a href="#">Bloque I</a></h4>
												<p>Nombre bloque 1</p>
												<p class="time-post">Leer acerca del bloque</p>
											</div>
										</li>
										<li>
											<div class="kids_image_wrapper ">
												<a href="/Estadias/pic/LegoMovie_3rd4.jpg" class="prettyPhoto kids_mini_picture" data-rel="prettyPhoto[rpwt]">
													<img src="/Estadias/pic/70x70-img-2.jpg" width="70" height="70" alt=""></a>
											</div>
											<div class="kids_post_content">
												<h4><a href="#">Bloque II</a></h4>
												<p>Lorem ipsum dolor ...</p>
												<p class="time-post">January 2, 2015</p>
											</div>
										</li>
										<li>
											<div class="kids_image_wrapper ">
												<a href="/Estadias/pic/Tangled_3rd5.jpg" class="prettyPhoto kids_mini_picture" data-rel="prettyPhoto[rpwt]">
													<img src="/Estadias/pic/70x70-img-3.jpg" width="70" height="70" alt="">
												</a>
											</div>
											<div class="kids_post_content">
												<h4><a href="#">Bloque III</a></h4>
												<p>Lorem ipsum dolor ...</p>
												<p class="time-post">January 1, 2015</p>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>

				<div class="widget widget_cws_latest_posts">
					<div class="latest-posts-widget">
						<h3 class="widget-title">Desafíos matemáticos</h3>
						<div class="widget-content">
							<ul>
								<li>
									<div class="kids_image_wrapper ">
										<a href="/Estadias/pic/HappyFeet_1st4.jpg" class="prettyPhoto kids_mini_picture" data-rel="prettyPhoto[rpwt]">
											<img src="/Estadias/pic/70x70-img-1.jpg" width="70" height="70" alt=""></a>
									</div>
									<div class="kids_post_content">
										<h4><a href="#">Bloque I</a></h4>
										<p>Lorem ipsum dolor ...</p>
										<p class="time-post">January 3, 2015</p>
									</div>
								</li>
								<li>
									<div class="kids_image_wrapper ">
										<a href="/Estadias/pic/LegoMovie_3rd4.jpg" class="prettyPhoto kids_mini_picture" data-rel="prettyPhoto[rpwt]">
											<img src="/Estadias/pic/70x70-img-2.jpg" width="70" height="70" alt=""></a>
									</div>
									<div class="kids_post_content">
										<h4><a href="#">Bloque II</a></h4>
										<p>Lorem ipsum dolor ...</p>
										<p class="time-post">January 2, 2015</p>
									</div>
								</li>
								<li>
									<div class="kids_image_wrapper ">
										<a href="/Estadias/pic/Tangled_3rd5.jpg" class="prettyPhoto kids_mini_picture" data-rel="prettyPhoto[rpwt]">
											<img src="/Estadias/pic/70x70-img-3.jpg" width="70" height="70" alt="">
										</a>
									</div>
									<div class="kids_post_content">
										<h4><a href="#">Bloque III</a></h4>
										<p>Lorem ipsum dolor ...</p>
										<p class="time-post">January 1, 2015</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="widget widget_cws_latest_posts">
					<div class="latest-posts-widget">
						<h3 class="widget-title">Ciencias Naturales</h3>
						<div class="widget-content">
							<ul>
								<li>
									<div class="kids_image_wrapper ">
										<a href="/Estadias/pic/HappyFeet_1st4.jpg" class="prettyPhoto kids_mini_picture" data-rel="prettyPhoto[rpwt]">
											<img src="/Estadias/pic/70x70-img-1.jpg" width="70" height="70" alt=""></a>
									</div>
									<div class="kids_post_content">
										<h4><a href="./cursos/ciencias-n.html">Bloque I</h4>
										<p>¿Cómo mantener la salud?</p>
										<p class="time-post">Acceder al bloque</p></a>
									</div>
								</li>

							</ul>
						</div>
					</div>
				</div>
				<div class="widget widget_calendar">
					<h3 class="widget-title">Calendario</h3>
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
					<li>Hola</li>
									<li class="lang_bar">
						<div id="lang_sel">

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
	<script type='text/javascript' src='/Estadias/js/jquery.min.js'></script>
	<script type="text/javascript" src='/Estadias/js/jquery-ui.min.js'></script>
	<script type='text/javascript' src='/Estadias/js/scripts.js'></script>
	<script type='text/javascript' src='/Estadias/js/retina.min.js'></script>
	<script type='text/javascript' src='/Estadias/js/jquery.tweet.js'></script>
	<script type='text/javascript' src='/Estadias/js/jquery.easing-1.3.min.js'></script>
	<script type='text/javascript' src='/Estadias/js/owl.carousel.js'></script>
	<script type='text/javascript' src='/Estadias/js/jquery.isotope.min.js'></script>
	<script type='text/javascript' src='/Estadias/js/jquery.flexnav.min.js'></script>
	<script type='text/javascript' src='/Estadias/js/jquery.prettyPhoto.js'></script>
</body>
</html>