<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/c7ad093c7c.js" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/application.css">
	<script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>

	</head>
	<body>

<?php
session_start();
include('../dashboard/config/conexion.php');
include('../dashboard/config/recaptchalib.php');
 $secret = "6LfB4LwfAAAAAIfGullid923Kt6ahI_r8qmQ2Il-";
 $response = null;
 // Verificamos la clave secreta
 $reCaptcha = new ReCaptcha($secret);
 if (isset($_POST["g-recaptcha-response"]) && $_POST["g-recaptcha-response"]) {
     $response = $reCaptcha->verifyResponse(
     $_SERVER["REMOTE_ADDR"],
     $_POST["g-recaptcha-response"]
     );
  }

 
if (isset($_POST['login']) && $response != null && $response->success) {
    $username = $_POST['username'];
    $password = $_POST['password'];

		$query  = $mysqli->query("SELECT id_usuario, clave, nombres FROM usuarios WHERE id_usuario='$username'");
		$result = $query->fetch_all(MYSQLI_ASSOC);
	 
	    if (!$result) {
	        echo '<p class="error">Error, datos incorrectos.</p>';
	    } else {
	        if (password_verify($password, $result[0]['clave'])) {
	            $_SESSION['user_id'] = $result[0]['id_usuario'];
	            $_SESSION['nombres'] = $result[0]['nombres'];
	            header("Location: ../dashboard/menu/");
	            //echo '<p class="success">Bienvenido!</p>';

	        } else {
	            echo '<p class="error">Error, contraseña o nombre de usuario incorrectos.</p>';
	        }
	    }
}

 
?>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">	
						<div style="text-align: center;">
						<img src="../imagenes/LogPoderJ.png" height="50" style="margin-top: 35px;">
						</div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100" style="text-align: center;">
			      			<h3 class="mb-4">Iniciar Sesión</h3>
			      		</div>
			      	</div>
							<form action="" class="signin-form" method="POST">
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" pattern="[a-zA-Z0-9]+" name="username" required>
			      			<label class="form-control-placeholder" for="username">Usuario</label>
			      		</div>
		            <div class="form-group">
		              <input id="password-field" type="password" class="form-control" name="password" required>
		              <label class="form-control-placeholder" for="password">Contraseña</label>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            	<div class="form-group btn">
		            	<div class="g-recaptcha" data-sitekey="6LfB4LwfAAAAAKOuCqL-8Wl4t9N2-ONgzHSXre27"></div>
		            	</div>

		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="login" value="login">Iniciar sesión</button>
		            </div>
						<div class="form-group">
						<a href="../invitado/index.php" class="form-control btn btn-primary rounded submit px-3" name="invitado" value="invitado">Invitado</a>
					</div>
		          </form>
		          
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

