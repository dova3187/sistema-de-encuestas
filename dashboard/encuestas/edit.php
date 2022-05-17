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
    $id_encuesta = $_GET["id"];
    $sentencia = $mysqli->prepare("SELECT id_encuesta, titulo, descripcion, estado, fecha_inicio, fecha_final FROM encuestas WHERE id_encuesta = ?");
    $sentencia->bind_param("i", $id_encuesta);
    $sentencia->execute();
    $resultado = $sentencia->get_result();

    $encuesta = $resultado->fetch_assoc();
    if (!$encuesta) {
        exit("No hay resultados para ese ID");
    }

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
                  <a href="#" class="active">Encuestas</a>
              </li>
              <li>
              <a href="#">Preguntas</a>
              </li>
              <li>
              <a href="#">Respuestas</a>
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

        <h2 class="mb-4">Actualizar encuesta</h2>
        <div class="row">
            <div class="col-12">
                
                <form action="update.php" method="POST">
                    <input type="hidden" name="id_encuesta" value="<?php echo $encuesta["id_encuesta"] ?>">
                    <div class="form-group">
                        <label for="nombre">Titulo</label>
                        <input value="<?php echo $encuesta["titulo"] ?>" placeholder="Titulo" class="form-control" type="text" name="titulo" id="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea placeholder="Descripción" class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" required><?php echo $encuesta["descripcion"] ?></textarea>
                    </div>


                    <div class="form-group"> <!-- Date input -->
                        <label class="control-label" for="date">Fecha Inicio</label>
                        <input class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="MM/DD/YYY" type="text" value="<?php echo $encuesta["fecha_inicio"] ?>" />
                    </div>
                    <div class="form-group"> <!-- Date input -->
                        <label class="control-label" for="date">Fecha Final</label>
                        <input class="form-control" id="fecha_final" name="fecha_final" placeholder="MM/DD/YYY" type="text" value="<?php echo $encuesta["fecha_final"] ?>" />
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Guardar</button>
                        <a class="btn btn-danger" href="index.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
      </div>
</html>
    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script type="text/javascript">
    $(document).ready(function(){
      var date_input_start=$('input[name="fecha_inicio"]'); //our date input has the name "date"
      var date_input_end=$('input[name="fecha_final"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input_start.datepicker(options);
      date_input_end.datepicker(options);
    })
    </script>
  </body>
</html>