<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $pageTitle;?></title>
	<meta name="keywords" content="curecia arquitectos ingenieros bogota colombia" />
	<meta name="author" content="Martz" />
	<link rel="stylesheet" href="css/normalize.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="icon" type="image/png" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0">
	<script src="js/modernizr.custom.js"></script>
</head>

<body>
	<header class="container clearfix">	
		<div id="logo">						
			<object data="images/logo_curecia.svg" type="image/svg+xml" class="logo">
			    <!--[if lte IE 8 ]-->
			      <img src="images/logo.png" alt="CURE Y CIA LTDA">
			    <!--![endif]-->
			</object>
		</div>	
		<div id="nav" class="grid_12">			
			<ul> 
				<li><a class="<?php if ($section == "inicio") { echo "on"; } ?>" href="inicio">inicio</a></li>
				<li><a class="<?php if ($section == "estudio") { echo "on"; } ?>" href="estudio">estudio</a></li>
				<li><a class="<?php if ($section == "servicios") { echo "on"; } ?>" href="servicios">servicios</a></li>
				<li><a class="<?php if ($section == "portafolio") { echo "on"; } ?>" href="portafolio">portafolio</a></li>
				<li><a class="<?php if ($section == "contacto") { echo "on"; } ?>" href="contacto">contacto</a></li>
			</ul>			
		</div>		
	</header>	