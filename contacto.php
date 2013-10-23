<?php 
$pageTitle="CURE Y CIA LTDA | Contacto";
$section="contacto";
include('inc/header.php'); ?>

	<div class=" grid_12 main">

		<div class="grid_12 contenido">
			<ul id="cbp-bislideshow" class="cbp-bislideshow">
				<li><img src="images/1.jpg" alt="image01"/></li>
				<li><img src="images/2.jpg" alt="image02"/></li>
				<li><img src="images/3.jpg" alt="image03"/></li>
				<li><img src="images/4.jpg" alt="image04"/></li>
				<li><img src="images/5.jpg" alt="image05"/></li>
				<li><img src="images/6.jpg" alt="image06"/></li>
			</ul>
					<!--<div id="cbp-bicontrols" class="cbp-bicontrols">
						<span class="cbp-biprev"></span>
						<span class="cbp-bipause"></span>
						<span class="cbp-binext"></span>
					</div> -->

				</div>

				<div class=" grid_4 contacto">

					

					<div class="grid_4"> 

						<ul class="infoEmpresa"> 
							<li><h1>CONTACTO</h1></li>
							<li> Carrera 15 # 80-48</li>
							<li> Oficina 102 </li>
							<li> Bogotá D.C - Colombia</li>
							<br>
							<li> Tel: (571) 2573428</li>
							<li> Cel: 310 613 6556</li>
							<li> info@curecia.com</li>
							<li> <a href="#openModal">Contáctanos</a></li>
						</ul>

					</div>

					<div class="googleMap" id="googleMap"></div>



					<div id="openModal" class="modalDialog">
						<div>
							<a href="#close" title="Close" class="close">X</a>
							<h2>CONTÁCTANOS</h2>
							<form id="contact-form" action="contacto.html" method="post">

								<h5>LLena el formulario y nos comunicaremos contigo en menos de 24 horas.</h5>
								<div>
									<label>
										<span>Nombre:*</span>
										<input placeholder="Ingrese su nombre" type="text" tabindex="1" required autofocus>
									</label>
								</div>
								<div>
									<label>
										<span>E-mail:*</span>
										<input placeholder="Ingrese su e-mail" type="email" tabindex="2" required>
									</label>
								</div>
								<div>
									<label>
										<span>Teléfono:*</span>
										<input placeholder="Ingrese su teléfono" type="tel" tabindex="3" required>
									</label>
								</div>

								<div>
									<label>
										<span>Message:*</span>
										<textarea placeholder="Escriba su mensaje" tabindex="4" required></textarea>
									</label>
								</div>
								<h6>*Campos requridos</h6>
								<div>
									<button name="submit" type="submit" id="contact-submit">Enviar</button>
								</div>
							</form>
						</div>
					</div>

				</div>



			</div>


		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<!-- imagesLoaded jQuery plugin by @desandro : https://github.com/desandro/imagesloaded -->
	<script src="js/jquery.imagesloaded.min.js"></script>
	<script src="js/cbpBGSlideshow.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
	<script>
	$(function() {
		cbpBGSlideshow.init();
	});

			/*
Creating an HTML5 enhanced responsive-ready contact form, with custom javascript feature detection
www.toddmotto.com
*/
(function() {

	// Create input element for testing
	var inputs = document.createElement('input');
	
	// Create the supports object
	var supports = {};
	
	supports.autofocus   = 'autofocus' in inputs;
	supports.required    = 'required' in inputs;
	supports.placeholder = 'placeholder' in inputs;

	// Fallback for autofocus attribute
	if(!supports.autofocus) {
		
	}
	
	// Fallback for required attribute
	if(!supports.required) {
		
	}

	// Fallback for placeholder attribute
	if(!supports.placeholder) {
		
	}
	
	// Change text inside send button on submit
	var send = document.getElementById('contact-submit');
	if(send) {
		send.onclick = function () {
			this.innerHTML = '..Enviando';
		}
	}

})();


// gogle maps 

function initialize() {
	var myLatlng = new google.maps.LatLng(4.66704,-74.056806);
	var mapOptions = {
		zoom: 16,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: 'CURE Y CIA LTDA'
	});
}

google.maps.event.addDomListener(window, 'load', initialize);



</script>
</body>
</html>