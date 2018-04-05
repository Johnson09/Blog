<!DOCTYPE HTML>
<html>
	<head>
		<title>Result</title>
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
		<?php include "validation.php" ?>
	</head>
	<body class="no-sidebar">

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<h1><a href="#">VIEW</a></h1>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.html">HOMEPAGE</a></li>
							<li><a href="left-sidebar.html">PROFESIONAL</a></li>
							<li><a href="form.php">APPLICATION FORM</a></li>
							<li class="active"><a href="result.php">VIEW</a></li>
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
				
						<section>
							<header>
								<h2>Validation Result</h2>
							</header>
							<article>
								<table>	
									<tr>
										<td>
											<label>Name:</label>
										</td>
										<td>
											<i><?php namevali('Nombre') ?></i>
										</td>
									</tr>
									<tr>
										<td>
											<label>Last Name:</label>
										</td>
										<td>
											<i><?php namevali('Apellido') ?></i>
										</td>
									</tr>
									<tr>
										<td>
											<label>Age:</label>
										</td>
										<td>
											<i><?php echo $_POST['Edad']; ?></i>
										</td>
									</tr>
									<tr>
										<td>
											<label>Birthday:</label>
										</td>
										<td>
											<i><?php datevali('Cumple'); ?></i>
										</td>
									</tr>
									<tr>
										<td>
											<label>Phone:</label>
										</td>
										<td>
											<i><?php numbervali('Telefono') ?></i>
										</td>
									</tr>
									<tr>
										<td>
											<label>Email:</label>
										</td>
										<td>
											<i><?php emailvali('Correo') ?></i>
										</td>
									</tr>
								</table>
							</article>
							<article>
								<button><a href="form.php">Regresar o completar formulario</a></button>
							</article>
						</section>
			</div>
			<!-- Main -->

		</div>
	<!-- /Main -->

	</body>
</html>