<!DOCTYPE html>
<!--[if lte IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<html class="no-ie">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="alternate" type="application/rss+xml" title="&raquo; Comments Feed" href="#" />
	<link rel="shortcut icon" href="/Estadias/images/favicon.png">
	<link rel="stylesheet" href="/Estadias/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/Estadias/css/styles.css" />
	<link rel="stylesheet" type="text/css" href="/Estadias/css/maps.css" />
	<link rel="stylesheet" type="text/css" href="/Estadias/css/woocommerce.css" />
	<link rel="stylesheet" type="text/css" href="/Estadias/css/flexnav.css" />
	<link rel="stylesheet" type="text/css" href="/Estadias/css/prettyPhoto.css" />
	<link rel="stylesheet" type="text/css" href="/Estadias/revslider/styles.css" />
  	<link rel="stylesheet" href="/Estadias/css/bootstrap.min.css">
</head>



<body data-type-of-widget="2" class="home page kids-front-page t-pattern-1">
	<!-- Inicio Encabezado -->
	<div class="top-panel">
		<div class="l-page-width clearfix">
			<div class="wrapper">

			</div>
		</div>
	</div>
	<!--/ .panel.superior-->
	<div class="kids-bg-level-1">
		<div class="bg-level-1"></div>
		<header id="kids_header">
			<div class="l-page-width clearfix">
				<ul class="kids_social">

					<li><a href="#" title="Google Plus" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a><span style="background-color:#dd4b39;"></span></li>
					<li><a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook fa-2x"></i></a><span style="background-color:#3b5998;"></span></li>
					<li><a href="#" title="Youtube" target="_blank"><i class="fa fa-youtube-play fa-2x"></i></a><span style="background-color:#b31217;"></span></li>
					<li><a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter fa-2x"></i></a><span style="background-color:#4099ff;"></span></li>

				</ul>
				<!-- .Inicio logo -->
				<div class="kids_clear"></div>
				<div id="kids_logo_block" class="logo-position-left">
					<a id="kids_logo_text" href="/Estadias/index.php"><img src="/Estadias/images/logo-.png" alt="Aprende jugando" title="Aprende jugando" /></a>
				</div>
				<nav id="kids_main_nav" class="menu-position-right">
					<div class="menu-button">
						<span class="menu-button-line"></span>
						<span class="menu-button-line"></span>
						<span class="menu-button-line"></span>
					</div>
					<ul id="menu-main" class="clearfix flexnav " data-breakpoint="800">
						<li class="menu-item menu-item-type-custom menu-item-object-custom "><a href="/Estadias/index.php">Inicio</a></li>
						<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="#">Materias</a>
							<ul class="sub-menu">
								<li class="menu-item"><a href="/Estadias/cursos/Espanol">Español</a></li>
								<li class="menu-item"><a href="/Estadias/cursos/mate">Desafíos matemáticos</a></li>
								<li class="menu-item"><a href="/Estadias/cursos/CienciasNaturales/Bloque1">Ciencias Naturales</a></li>
							</ul>
						</li>
						<li class="menu-item"><a href="/Estadias/contacto.php">Contacto</a></li>
						<?php if (isset($_SESSION['id_alumno']))
{
echo '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="/Estadias/admin">Bienvenido, '.$_SESSION['id_alumno']. '</a>';
echo '<ul class="sub-menu">';
echo '<li class="menu-item"><a href="/Estadias/admin">Administración</a></li>';
echo '<li class="menu-item"><a href="/Estadias/logout.php">Cerrar sesión</a></li>';
echo '</ul>';
echo '</li>';
} else{
echo '<li class="menu-item"><a href="login.php">Iniciar sesión</a></li>';
}
?>
            <!--<li class="menu-item"><a href="login.php">Iniciar sesión</a></li>-->
					</ul>
				</nav>
				<!-- #kids_main_nav -->
			</div>
			<!--/ .l-page-width-->
		</header>
		<!--/ #kids_header-->
		<!-- HEADER END -->
