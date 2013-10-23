<?php 
$pageTitle="CURE Y CIA LTDA | Inicio";
$section="inicio";
include('inc/header.php'); ?>

	<div class=" grid_12 main">
		<ul id="cbp-bislideshow" class="cbp-bislideshow">
			<li><img src="images/1.jpg" alt="image01"/></li>
			<li><img src="images/2.jpg" alt="image02"/></li>
			<li><img src="images/3.jpg" alt="image03"/></li>
			<li><img src="images/4.jpg" alt="image04"/></li>
			<li><img src="images/5.jpg" alt="image05"/></li>
			<li><img src="images/6.jpg" alt="image06"/></li>
		</ul>			
	</div>

	<div class="thumbnail"><p><a href="portafolio.php">proyectos</a></p></div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<!-- imagesLoaded jQuery plugin by @desandro : https://github.com/desandro/imagesloaded -->
	<script src="js/jquery.imagesloaded.min.js"></script>
	<script src="js/cbpBGSlideshow.min.js"></script>
	<script>
	$(function() {
		cbpBGSlideshow.init();
	});
	</script>
</body>
</html>