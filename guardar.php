<?php
	session_start();
	include("conexion.php");

	$id_encuesta = $_POST['id_encuesta'];

	$query10 = "SELECT * FROM encuestas WHERE id_encuesta = '$id_encuesta'";
	$resultado10 = $con->query($query10);
	$row10 = $resultado10->fetch_assoc();
  	$ids = array();
  	$respuesta_texto = $_POST['texto'];
  	$count_respuesta_texto = count($respuesta_texto);
 ?>
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
	<center>
		<div style="margin-top: 50px"></div>
		<?php

		$id_usuario = "invitado";
		$id_encuesta = 1;
		$oficina = $_SESSION["oficina"];
		$periodo = $_SESSION["periodo"];
		$etapa = $_SESSION["etapa"];

		//$query5 = "SELECT * FROM usuarios_encuestas WHERE id_usuario = '$id_usuario' AND id_encuesta = '$id_encuesta'";
		//$resultado5 = $con->query($query5);
		//$tamaño = $resultado5->num_rows;

		//if ($tamaño > 0) {
		//	echo "Ya respondiste la encuesta";
		//	echo "<br/>";
		//} else {
			
			$query6 = "INSERT INTO usuarios_encuestas (id_usuario, id_encuesta) VALUES ('$id_usuario', '$id_encuesta')";
			$resultado6 = $con->query($query6);

			$id_usuario = $con->insert_id;

			$head_sql = "INSERT INTO resultado_encabezado (id_encuesta, num_oficina, id_anios, id_etapa, id_usuarios_encuestas) 
							VALUES ('$id_encuesta', '$oficina', '$periodo', '$etapa', '$id_usuario')";
			$save_head = $con->query($head_sql);


			if ($row10['estado'] == '1') {
			 	for ($i = 1; $i <= 100; $i++) {

					if (isset($_POST[$i])) {
						$ids[$i] = $_POST[$i];
						$id = $ids[$i];
						$query2 = "SELECT id_opcion, id_pregunta, valor FROM opciones WHERE id_opcion = '$ids[$i]'";
						$resultado2 = $con->query($query2);

						if ($row2 = $resultado2->fetch_assoc()) {
							$id_opcion = $row2['id_opcion'];
							$query3 = "INSERT INTO resultados (id_opcion) 
							VALUES ('$id_opcion')";
							$resultado3 = $con->query($query3);
							if (!$resultado3) {
								echo "Error al ingresar resultado.";
							}
						}
					}
				}
				for ($i=0; $i < $count_respuesta_texto; $i++) { 
					$insert_txt = "INSERT INTO resultados (respuesta_texto) VALUES ('$respuesta_texto[$i]')";
					$save_txt = $con->query($insert_txt);
				}
				echo "Gracias por contestar la encuesta.";
			} 

			else {
				echo "<div style='margin-top: 50px;'><br/>¡La encuesta ya fue completada!</div>";
			}
		//}

		 ?>

		<br/><br/>
		<a class="btn btn-primary" href="index.php">Regresar</a><br/>
	</center>
		 	</div>
		<br/>
		
 	</div>
    
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="/js/jquery-3.3.1.slim.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>