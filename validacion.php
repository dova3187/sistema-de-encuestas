<?php 	

session_start();

 require_once "recaptchalib.php";   
 $secret = "6LfB4LwfAAAAAIfGullid923Kt6ahI_r8qmQ2Il-";
 $response = null;
 // Verificamos la clave secreta
 $reCaptcha = new ReCaptcha($secret);
 if ($_POST["g-recaptcha-response"]) {
     $response = $reCaptcha->verifyResponse(
     $_SERVER["REMOTE_ADDR"],
     $_POST["g-recaptcha-response"]
     );
  }
 
 if ($response != null && $response->success) {
		$id_usuario = $_POST['id_usuario'];
		$clave 	= $_POST['clave'];
		include("conexion.php");

		$query = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario' AND clave = '$clave'";
			

			$resultado = $con->query($query);

			
			if ($row = $resultado->fetch_assoc()) {


				if ($row['id_tipo_usuario'] == '1') {
					$_SESSION['id_usuario'] = $row['id_usuario'];
					$_SESSION['u_usuario'] = $row['nombres'];
					header("Location: administrador/indexconfi.php");
				} else {
					$_SESSION['id_usuario'] = $row['id_usuario'];
					$_SESSION['u_usuario'] = $row['nombres'];
					header("Location: usuario/index.php");
				}

			} else {
				header("Location: index.php");
			}
  } else {
    // Añade aquí el código que desees en el caso de que la validación no sea correcta o muestra
	if (!$query) {
	    printf("Error: %s\n", mysqli_error($conn));
	    exit();
	}
  }

 ?>