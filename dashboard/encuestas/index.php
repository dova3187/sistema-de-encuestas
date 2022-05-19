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
	$resultado = $mysqli->query("SELECT id_encuesta, id_usuario, titulo, descripcion, fecha_inicio, fecha_final FROM encuestas");
	$encuestas = $resultado->fetch_all(MYSQLI_ASSOC);
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
              <li class="active">
                  <a href="../encuestas/">Encuestas</a>
              </li>
              <li>
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
				        <a class="btn btn-warning my-2" href="../menu">Menú principal</a>
				        <table class="table">
				            <thead>
				                <tr>
				                    <th>ID</th>
				                    <th>Titulo</th>
				                    <th>Descripción</th>
				                    <th>Fecha inicio</th>
				                    <th>Fecha final</th>
				                    <th colspan="2">Acciones</th>
				                </tr>
				            </thead>
				            <tbody>
				                <?php
				                foreach ($encuestas as $encuesta) { ?>
				                    <tr>
				                        <td><?php echo $encuesta["id_encuesta"] ?></td>
				                        <td><?php echo $encuesta["titulo"] ?></td>
				                        <td><?php echo $encuesta["descripcion"] ?></td>
				                        <td><?php echo $encuesta["fecha_inicio"] ?></td>
				                        <td><?php echo $encuesta["fecha_final"] ?></td>
				                        <td>
				                            <a href="edit.php?id=<?php echo $encuesta["id_encuesta"] ?>">Editar</a>
				                        </td>
				                        <td>
				                            <a href="delete.php?id=<?php echo $encuesta["id_encuesta"] ?>">Eliminar</a>
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