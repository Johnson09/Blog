<?php 
	function datevali($var){
		$fecha = array();
		$fecha = split('[-./]', $_POST[$var]);
		if (isset($_POST[$var]) && checkdate($fecha[1], $fecha[2], $fecha[0])) {
			echo $fecha[1] ." - ". $fecha[2] ." - ". $fecha[0];
		}else{
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'form.php';
			header("Location: http://$host$uri/$extra");
			//header('Location: http://localhost:8080/templated-exmachina/form.php');
		}
	}

	function namevali($var){
		if (isset($_POST[$var])) {
			if (ctype_alpha($_POST[$var]) || strpos($_POST[$var], " ")) {
				echo $_POST[$var];
			}
		}else{
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'form.php';
			header("Location: http://$host$uri/$extra");
			//header('Location: http://localhost:8080/templated-exmachina/form.php');
		}
	}

	function numbervali($var){
		if (isset($_POST[$var]) && is_numeric($_POST[$var])) {
			if (strlen($_POST[$var]) >= 6 && strlen($_POST[$var]) <= 10) {
				echo $_POST[$var];
			}
		}else{
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'form.php';
			header("Location: http://$host$uri/$extra");
			//header('Location: http://localhost:8080/templated-exmachina/form.php');
		}
	}

	function emailvali($var){
		$arreglo = array($_POST[$var]);

		function Counter($string){
    	    $string = preg_match_all('/([@])/',$string,$foo);
        	return $string;
        }  

		if (isset($_POST[$var])) {
			if (Counter($_POST[$var]) == 1) {
				$dominio = explode('@', $_POST[$var]);
				if ($dominio[1] == "hotmail.com" || $dominio[1] == "gmail.com" || $dominio[1] == "outlook.com" || $dominio[1] == "misena.edu.com") {
					echo $_POST[$var];
				}
			}
		}else{
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'form.php';
			header("Location: http://$host$uri/$extra");
			//header('Location: http://localhost:8080/templated-exmachina/form.php');
		}
	}

 ?>