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
    $id_opcion= $_GET["id"];
    $id_pregunta = $_GET["id_pregunta"];
    $sentencia = $mysqli->prepare("SELECT id_opcion, id_pregunta, valor FROM opciones WHERE id_opcion = ?");
    $sentencia->bind_param("i", $id_opcion);
    $sentencia->execute();
    $resultado = $sentencia->get_result();

    $opcion = $resultado->fetch_assoc();
    if (!$opcion) {
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

        <h2 class="mb-4">Actualizar opción</h2>
        <div class="row">
            <div class="col-12">
                
                <form action="update.php" method="POST">
                    <input type="hidden" name="id_opcion" value="<?php echo $opcion["id_opcion"] ?>">
                    <input type="hidden" name="id_pregunta" value="<?php echo $opcion["id_pregunta"] ?>">
                    <div class="form-group">
                        <label for="nombre">Titulo</label>
                        <input value="<?php echo $opcion["valor"] ?>" placeholder="Valor" class="form-control" type="text" name="valor" id="valor" required>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-success">Guardar</button>
                        <a class="btn btn-danger" href="form.php?id_pregunta=<?php echo $id_pregunta?>">Cancelar</a>
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