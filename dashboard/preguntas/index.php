<!doctype html>
<html lang="en">
  <head>
  	<title>Dashboard || admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
	<?php
	$mysqli = include_once "../config/conexion.php";
	$resultado = $mysqli->query("SELECT 
																preguntas.id_pregunta, 
																preguntas.id_encuesta, 
																preguntas.titulo, 
																preguntas.id_tipo_pregunta, 
																tipo_pregunta.nombre
															FROM 
																preguntas 
															INNER JOIN 
																tipo_pregunta 
															ON 
																preguntas.id_tipo_pregunta = tipo_pregunta.id_tipo_pregunta
															ORDER BY 
																preguntas.id_encuesta");
	$preguntas = $resultado->fetch_all(MYSQLI_ASSOC);
	?>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		
		  		<img src="../../imagenes/LogPoderJ.png" class="responsive" width="200"></br>

		  	</br><h4>Configuración</h4>
	        <ul class="list-unstyled components mb-5">
              <li>
                  <a href="../encuestas/">Encuestas</a>
              </li>
              <li class="active">
              <a href="../preguntas/">Preguntas</a>
              </li>
              <li>
              <a href="../respuestas/">Respuestas</a>
              </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  ©2022 Poder Judicial del Estado de Yucatán. Todos los Derechos Reservados.</p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        <h2 class="mb-4">Encuestas</h2>
				<div class="row">
				    <div class="col-12">
				        <a class="btn btn-success my-2" href="form.php">Agregar nuevo</a>
				        <a class="btn btn-warning my-2" href="../../administrador/indexconfi.php">Menú principal</a>
				        <table class="table">
				            <thead>
				                <tr>
				                    <th>ID</th>
				                    <th>Encuesta</th>
				                    <th>Titulo</th>
				                    <th>Tipo de pregunta</th>
				                    <th colspan="3">Acciones</th>
				                </tr>
				            </thead>
				            <tbody>
				                <?php
				                foreach ($preguntas as $pregunta) { ?>
				                    <tr>
				                        <td><?php echo $pregunta["id_pregunta"] ?></td>
				                        <td><?php echo $pregunta["id_encuesta"] ?></td>
				                        <td><?php echo $pregunta["titulo"] ?></td>
				                        <td><?php echo $pregunta["nombre"] ?></td>
				                        
				                        
				                        <td>
				                            <a href="edit.php?id=<?php echo $pregunta["id_pregunta"] ?>">Editar</a>
				                        </td>
				                        <td>
				                            <a href="delete.php?id=<?php echo $pregunta["id_pregunta"] ?>">Eliminar</a>
				                        </td>
				                        <td>
				                        	<?php
				                        		//As long as "Selección múltiple = 1", "Desplegable = 2", "Casilla de verificación = 3", "Texto = 4"
				                        		if ($pregunta["id_tipo_pregunta"] == 1){?>
				                        		<a href="../opciones/form.php?id_pregunta=<?php echo $pregunta["id_pregunta"] ?>">Agregar opciones</a>
				                        	<?php }?>
				                        </td>
				                    </tr>
				                <?php } ?>
				            </tbody>
				        </table>
				    </div>
				</div>
      </div>
		</div>
	</body>
</html>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>