<?php 	session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/styles.css">


  <title>Responder</title>

</head>
<body>
  
 	<div class="container text-center card" style="background-color:#557982; margin-top:200px;">
    <div>
        <img src="imagenes/LogPoderJ.png" height="80" width="270" style="margin-top:50px;">
    </div>
 		<hr /> 
 		
 		


 		<hr />
<?php
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
 
 //if ($response != null && $response->success) {
 
		$id_usuario = "admifull";
		$clave 	= "1234";
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
  //} else {
  //	    echo "¡Validación incorrecta, verifica la casilla del capcha!";
//	    exit();
  //}
 ?>
		


		<a href="index.php" class="btn btn-primary">Regresar</a>
 	</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="/js/jquery-3.3.1.slim.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>