<?php 	
 session_start();
 require_once "recaptchalib.php";   
 include("conexion.php");
 $secret = "6LfB4LwfAAAAAIfGullid923Kt6ahI_r8qmQ2Il-";
 $response = null;

 	$select_encuesta = "SELECT id_encuesta FROM encuestas WHERE estado = 1 ORDER BY id_encuesta ASC LIMIT 1";
 	$value_encuesta = $con->query($select_encuesta);
 	$row_value = $value_encuesta->fetch_assoc();

  $id_encuesta = $row_value['id_encuesta'];

  $query = "SELECT * FROM encuestas WHERE id_encuesta = '$id_encuesta'";
  $respuesta = $con->query($query);
  $row = $respuesta->fetch_assoc();


  $query3 = "SELECT * FROM tipo_pregunta";
  $respuesta3 = $con->query($query3);



 // Verificamos la clave secreta
 $reCaptcha = new ReCaptcha($secret);
 if ($_POST["g-recaptcha-response"]) {
     $response = $reCaptcha->verifyResponse(
     $_SERVER["REMOTE_ADDR"],
     $_POST["g-recaptcha-response"]
     );
  }
 
 if ($response != null && $response->success) {	
		$_SESSION['numero_encuesta'] = $_POST['numero_encuesta'];
		$_SESSION['oficina'] 	= $_POST['oficina'];
		$_SESSION['periodo'] 	= $_POST['periodo'];
		$_SESSION['etapa'] 	= $_POST['etapa'];

// Diseñamos el encabezado de la tabla
/* $data = '
    <table class="table table-bordered table-hover table-condensed">
        <thead class="thead-dark">
            <tr>
                <th>ID Pregunta</th>
                <th>Título</th>

            </tr>
        </thead>';
comment for test2
$query = "SELECT preguntas.id_pregunta, preguntas.id_encuesta, preguntas.titulo, tipo_pregunta.nombre
            FROM preguntas
            INNER JOIN tipo_pregunta
            ON preguntas.id_tipo_pregunta = tipo_pregunta.id_tipo_pregunta
            WHERE preguntas.id_encuesta = '$id_encuesta'";

$resultado = $con->query($query);

while ($row = $resultado->fetch_assoc()) {
    $data .= '
        <tbody>
            <tr>
                <td>' . $row["id_pregunta"] . '</td>
                <td><a href="mostrar_opciones.php?id_pregunta=' . $row['id_pregunta'] . '">' . $row['titulo'] . '</a></td>

            </tr>
        </tbody>';
}

$data .= '</table>';

echo $data; */
  	////////////$id_encuesta = 1; //set manual
 	$query2 = "SELECT * FROM preguntas WHERE id_encuesta = '$id_encuesta'";
  	$respuesta2 = $con->query($query2);

  	$query3 = "SELECT encuestas.titulo, encuestas.descripcion, preguntas.id_pregunta, preguntas.id_encuesta, preguntas.id_tipo_pregunta 
		FROM preguntas
		INNER JOIN encuestas
		ON preguntas.id_encuesta = encuestas.id_encuesta
		WHERE preguntas.id_encuesta = '$id_encuesta'";
	$respuesta3 = $con->query($query3);
	$row3 = $respuesta3->fetch_assoc();
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
 		<hr /> 
 		<h1><?php echo $row3['titulo'] ?></h1>
 		<h3>Invitado</h3>
 		<p><?php echo $row3['descripcion'] ?></p>

 		<form action="guardar.php" method="Post" autocomplete="off">

 		<input type="hidden" id="id_encuesta" name="id_encuesta" value="<?php echo $id_encuesta ?>" />

 		<hr />
 		<?php

 			$i = 1; 
			while (($row2 = $respuesta2->fetch_assoc())) {

			$id = $row2['id_pregunta'];

			$query = "SELECT preguntas.id_pregunta, preguntas.titulo, preguntas.id_tipo_pregunta, opciones.id_opcion, opciones.valor
				FROM opciones
				INNER JOIN preguntas
				ON preguntas.id_pregunta = opciones.id_pregunta
                WHERE preguntas.id_pregunta = $id
				ORDER BY opciones.id_pregunta, opciones.id_opcion";

			$respuesta = $con->query($query);

		 ?>
		 	<div class="container col-md-12">
			<h4><?php echo "$i. " . $row2['titulo'] ?></h4>
			
		<?php if ($row2['id_tipo_pregunta'] == 4) {?>
					<div class="text-center">
				      <label><input class="form-control" type="text" name="texto[]" value="" required> </label>
				  </div></br>
		<?php }?>
		<?php if ($row2['id_tipo_pregunta'] == 1) {?>
				<?php 
					while (($row = $respuesta->fetch_assoc())) {
				 ?>
					<div class="radio">
				      <label><input class="form-check-input" type="radio" name="<?php echo $row['id_pregunta'] ?>" value="<?php echo $row['id_opcion'] ?>" required> <?php echo $row['valor'] ?></label>
				  </div>
				<?php 	
					}
					$i++;
				}
				 ?>
		<?php }?>
		 	</div>
		<br/>
		<input type="hidden" name="id_encuesta" value="<?php echo $id_encuesta ?>">
		<input class="btn btn-primary" type="submit" value="Responder">
		</form>


		<a href="index.php" class="btn btn-primary">Regresar</a>
 	</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="/js/jquery-3.3.1.slim.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>

<?php

  } else {
    // Añade aquí el código que desees en el caso de que la validación no sea correcta o muestra
	if (!$query) {
	    printf("Error: %s\n", mysqli_error($conn));
	    exit();
	}
  }

 ?>