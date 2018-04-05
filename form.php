<!DOCTYPE HTML>
<html>
	<head>
		<title>Form</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,400,300,700' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<?php
		//Activamos sesión.
		session_start();

		//Reseteo de variables.
		$nombreValido = $ApeValido = $emailValido = $telefonoValido = $errorsNombre = $errorsApe = $errorsEmail = $errorsTel = $Ape = $nombre = $email = $telefono = NULL;    

		//Definido formulario
		if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {    

		  //Obtenemos datos para comprobaciones (preg_match y email filter) (Importante).
		  $nombreValido = dataForm($_POST['Nombre']);
		  $ApeValido = dataForm($_POST['Apellido']);
		  $emailValido = dataForm($_POST['Correo']);
		  $telefonoValido = dataForm($_POST['Telefono']);

		  //Regla nombre
		  if (empty($_POST['Nombre'])) {
		    $errorsNombre = "\n Por favor ingrese su nombre."; 
		  } elseif (!preg_match("/^[a-zA-Z ]*$/",$nombreValido)) {
		    $errorsNombre = "\n Sólo se permiten letras y espacios en blanco."; 
		  } else {  //Caso verdadero obtenemos datos.  
		    $nombre = dataForm($_POST['Nombre']);
		  }

		  if (empty($_POST['Apellido'])) {
		    $errorsApe = "\n Por favor ingrese su Apellido."; 
		  } elseif (!preg_match("/^[a-zA-Z ]*$/",$ApeValido)) {
		    $errorsApe = "\n Sólo se permiten letras y espacios en blanco."; 
		  } else {  //Caso verdadero obtenemos datos.  
		    $Ape= dataForm($_POST['Apellido']);
		  }

		  //Regla email
		  if (empty($_POST['Correo'])) {
		    $errorsEmail = "\n Por favor ingrese su email. "; 
		  } elseif (!filter_var($emailValido, FILTER_VALIDATE_EMAIL)) {
		    $errorsEmail = "\n Email no valido";
		  } else { //Caso verdadero obtenemos datos.  
		    $email = dataForm($_POST['Correo']);
		  }

		  //Regla telefono.
		  if (empty($_POST['Telefono'])) {
		    $errorsTel = "\n Por favor ingresar su número telefono. "; 
		  } elseif (!preg_match("/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/", $telefonoValido)) {
		    $errorsTel = "\n Número no valido";
		  } else { //Caso verdadero obtenemos datos.  
		    $telefono = dataForm($_POST['Telefono']);
		  }

		  //Comprobamos si todos los datos son verdadero.
		  if ($nombre && $email && $telefono && $Ape) {
		    unset($_POST['submit']);
		    $msg = "Gracias por sus comentarios";    

		  }      

		}//End isset formulario.

		//Function -> Salida de datos.
		function dataForm($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		?>

		<div class="error">

		<?php 
		//Caso enviar, mensaje OK, invisible formulario.   
		if(isset($msg)){
		  include "result.php";
		} else { //Caso falso mostramos formulario.
		?>
	</head>
	<body class="right-sidebar">

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<h1><a href="#">APPLICATION FORM</a></h1>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.html">HOMEPAGE</a></li>
							<li><a href="left-sidebar.html">PROFESIONAL</a></li>
							<li class="active"><a href="form.php">APPLICATION FORM</a></li>
							<li><a href="result.php">VIEW</a></li>
						</ul>
					</nav>

			</div>
		</div>
	<!-- Header -->
		
	<!-- Banner -->
		<div id="banner">
			<div class="container">
			</div>
		</div>
	<!-- /Banner -->

	<!-- Main -->
		<div id="page">
				
			<!-- Main -->
			<div id="main" class="container">
				<div class="row">
					<div class="9u">
						<section>
							<header>
								<h2>Form</h2>
								<span class="byline">Integration</span>
							</header>
							<p>It allows to integrate any type of form in any type of page within your web page in a very simple way by means of a code and integration that can be incorporated into your html. In fact, the process is the same for a contact web as for a landing page, and it is also very agile.
								<img src="images/forms.png"></p>
						</section>
					</div>
					
					<div class="3u">
						<section class="sidebar">
							<div align="center">
								<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="contact_form" name="contact_form">
									
									<label>Name: </label>
									<p>
										<input type="text" name="Nombre" required value='<?php echo htmlentities($nombre) ?>'>
										<span class="form_hint">This field is required</span>
										<div>
											<?php if (!empty($errorsNombre)) {  echo "<span class=estiloError>$errorsNombre</span>";  }  ?>
										</div>
									</p>
									
									<label>Last Name: </label>
									<p>
										<input type="text" name="Apellido" required value='<?php echo htmlentities($Ape) ?>'>
										<span class="form_hint">This field is required</span>
										<div>
											<?php if (!empty($errorsApe)) {  echo "<span class=estiloError>$errorsApe</span>";  }  ?>
										</div>
									</p>
									
									<label>Age: </label>
									<p>
										<input type="number" name="Edad" required >
										<span class="form_hint">This field is required</span>
									</p>
									
									<label>Birthday: </label>
									<p>
										<input type="date" name="Cumple" required >
										<span class="form_hint">This field is required</span>
									</p>
									
									<label>Phone: </label>
									<p>
										<input type="number" name="Telefono" required value='<?php echo htmlentities($telefono) ?>'>
										<span class="form_hint">This field is required</span>
										<div>
											<?php if (!empty($errorsTel)) {  echo "<span class=estiloError>$errorsTel</span>";  }  ?>
										</div>
									</p>
									
									<label>Email: </label>
									<p>
										<input type="email" name="Correo" required value='<?php echo htmlentities($email) ?>'>
										<span class="form_hint">This field is required</span>
										<div>
											<?php if (!empty($errorsEmail)) {  echo "<span class=estiloError>$errorsEmail</span>";  }  ?>
										</div>
									</p>
									<p>
										<input type="submit" name="submit" value="Sent">
										<input type="reset" value="Clean">
									</p>
								</form>	
								<?php 
								} //Fin else.
								?>	
							</div>
						</section>
					</div>

				</div>
			</div>
			<!-- Main -->

		</div>
	<!-- /Main -->

	<!-- Featured -->
		<div id="featured">
			<div class="container">
				<div class="row">
					<section class="4u">
						
							<a href="#" class="image left"><img src="images/pics04.jpg"  style="width: 25em" alt=""></a>
						
					</section>
					<section class="4u">
						
							<a href="#" class="image left"><img src="images/pics05.jpg" alt=""></a>

					</section>
					<section class="4u">
						
							<a href="#" class="image left"><img src="images/pics06.jpg"  style="width: 25em" alt=""></a>
						
					</section>
				</div>
				<div class="divider"></div>
			</div>
		</div>
	<!-- /Featured -->

	<!-- Footer -->
		<div id="footer">
			<div class="container">
				<div class="row">
					<div class="3u">
						<section>
							<h2>Remember</h2>
							<div class="balloon">
								<blockquote>&ldquo;&nbsp;&nbsp;The practice will make me the true owner of the secret, not just his knowledge as the lazy believe.&nbsp;&nbsp;&rdquo;<br>
									<br>
									<strong>&ndash;&nbsp;&nbsp;2Pac</strong></blockquote>
							</div>
							<div class="ballon-bgbtm">&nbsp;</div>
						</section>
					</div>
					<div class="3u" style="float: right;">
						<section>
							<img src="images/rt.jpg">
						</section>
					</div>
				</div>
			</div>
		</div>
	<!-- /Footer -->

	<!-- Copyright -->
		<div id="copyright" class="container">
			Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
		</div>


	</body>
</html>