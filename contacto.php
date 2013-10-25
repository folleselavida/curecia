<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);


    if ($name == "" OR $email == "" OR $message == "" OR $phone == "") {
        echo "Verifique que todos los campos requeridos esten completos.";
        exit;
    }

    foreach( $_POST as $value ){
        if( stripos($value,'Content-Type:') !== FALSE ){
            echo "Existe problemas con la informacion que ingreso.";    
            exit;
        }
    }

    require_once("inc/phpmailer/class.phpmailer.php");
    $mail = new PHPMailer();

    if (!$mail->ValidateAddress($email)){
        echo "You must specify a valid email address.";
        exit;
    }

    $email_body = "";
    $email_body = $email_body . "Nombre: " . $name . "<br>";
    $email_body = $email_body . "Email: " . $email . "<br>";
    $email_body = $email_body . "Telefono: " . $phone . "<br>";
    $email_body = $email_body . "Mensaje: " . $message;

    $mail->SetFrom($email, $name);
    $address = "jd.florez39@gmail.com";
    $mail->AddAddress($address, "CURE & CIA");
    $mail->Subject    = "CURE & CIA - CONTACTENOS | " . $name;
    $mail->MsgHTML($email_body);

    if(!$mail->Send()) {
      echo "Hubo un problema enviando el correo: " . $mail->ErrorInfo;
      exit;
    }

    header("Location: contacto.php");
    exit;
}
?><?php 
$pageTitle="CURE Y CIA LTDA | Contacto";
$section="contacto";
include('inc/header.php'); ?>

	<div class="clearfix slider">
		<ul class="rslides">
		  	<li><img src="/images/1.jpg" alt="image01"/></li>
		  	<li><img src="/images/2.jpg" alt="image02"/></li>
		  	<li><img src="/images/3.jpg" alt="image03"/></li>
		  	<li><img src="/images/4.jpg" alt="image04"/></li>
		  	<li><img src="/images/5.jpg" alt="image05"/></li>
		  	<li><img src="/images/6.jpg" alt="image06"/></li>
		</ul>		
	</div>

	<div class="grid_4 contacto">
		
		<ul> 
			<li><h1>CONTACTO</h1></li>
			<li> Carrera 15 # 80-48 </li>
			<li> Oficina 102 </li>
			<li> Bogotá D.C - Colombia</li>
			<br>
			<li> Tel: (571) 2573428</li>
			<li> Cel: 310 613 6556</li>
			<li> info@curecia.com</li>
			<li> <a href="#openModal">Contáctanos</a></li>
		</ul>
	    
	    <div class="googleMap" id="googleMap"></div>
	</div>
		
	<div id="openModal" class="modalDialog">
		<div>
			<a href="#close" title="Close" class="close">X</a>
			<h2>CONTÁCTANOS</h2>
			<form id="contact-form" action="contacto.php" method="post">

				<h5>LLena el formulario y nos comunicaremos contigo en menos de 24 horas.</h5>

				<div>
					<label>
						<span><label for="name">Nombre*</label></span>
						<input placeholder="Ingrese su nombre" type="text" name="name" id="name" required autofocus>
					</label>
				</div>
				<div>
					<label>
						<span>E-mail:*</span>
						<input placeholder="Ingrese su e-mail" type="email" name="email" id="email" required>
					</label>
				</div>
				<div>
					<label>
						<span>Teléfono:*</span>
						<input placeholder="Ingrese su teléfono" type="tel" name="phone" id="phone" required>
					</label>
				</div>

				<div>
					<label>
						<span>Mensaje:*</span>
						<textarea placeholder="Escriba su mensaje" name="message" id="message" required></textarea>
					</label>
				</div>
				<h6>*Campos requridos</h6>
				<div>
					<button name="submit" type="submit" id="contact-submit">Enviar</button>
				</div>
			</form>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="/js/responsiveslides.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
	<script>
	    $(function() {
	    	$(".rslides").responsiveSlides();
	  	});

	  	//Contact modal
	
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


		// google maps 

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