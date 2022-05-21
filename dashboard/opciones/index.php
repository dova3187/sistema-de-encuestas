<!doctype html>
<html lang="en">
  <head>
  	<title>Dashboard || admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<script src="https://kit.fontawesome.com/c7ad093c7c.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
	<?php
	$mysqli = include_once "../config/conexion.php";
	$resultado = $mysqli->query("SELECT id_pregunta, id_encuesta, titulo, id_tipo_pregunta FROM preguntas ORDER BY id_encuesta");
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

            </br><h4><i class="fa-solid fa-screwdriver-wrench"></i> Configuración</h4>
            <ul class="list-unstyled components mb-5">
              <li>
                  <a href="../menu/"><i class="fa-solid fa-house"></i> Menú principal</a>
              </li>
              <li>
                  <a href="../encuestas/"><i class="fa-solid fa-square-poll-horizontal"></i> Encuestas</a>
              </li>
              <li class="active">
              <a href="../preguntas/"><i class="fa-solid fa-file-circle-question"></i> Preguntas</a>
              </li>
              <li>
              <a href="../respuestas/"><i class="fa-solid fa-file-circle-check"></i> Respuestas</a>
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
				                    <th>Encuesta</th>
				                    <th>Titulo</th>
				                    <th>Tipo de pregunta</th>
				                    <th colspan="2">Acciones</th>
				                </tr>
				            </thead>
				            <tbody>
				                <?php
				                foreach ($preguntas as $pregunta) { ?>
				                    <tr>
				                        <td><?php echo $pregunta["id_pregunta"] ?></td>
				                        <td><?php echo $pregunta["id_encuesta"] ?></td>
				                        <td><?php echo $pregunta["titulo"] ?></td>
				                        <td><?php echo $pregunta["id_tipo_pregunta"] ?></td>
				                        
				                        
				                        <td>
				                            <a href="edit.php?id=<?php echo $pregunta["id_pregunta"] ?>">Editar</a>
				                        </td>
				                        <td>
				                            <a href="delete.php?id=<?php echo $pregunta["id_pregunta"] ?>">Eliminar</a>
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