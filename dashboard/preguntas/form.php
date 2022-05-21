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
    $resultado_encuesta = $mysqli->query("SELECT id_encuesta, titulo, descripcion FROM encuestas");
    $resultado = $mysqli->query("SELECT id_tipo_pregunta, nombre, descripcion FROM tipo_pregunta");


    //$tipo_preguntas = $resultado->fetch_all(MYSQLI_ASSOC);

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

        <h2 class="mb-4">Registrar preguntas</h2>
    <div class="row">
        <div class="col-12">
            <form action="save.php" method="POST">

                <div class="form-group">
                      <label for="nombre">Id de encuesta</label></br>
                      <select class="form-control" name="id_encuesta">
                        <option value="0">Seleccione:</option>
                        <?php
                          
                          while ($encuesta = mysqli_fetch_array($resultado_encuesta)) {
                            echo '<option value="'.$encuesta['id_encuesta'].'">'.$encuesta['titulo'].'</option>';
                          }
                        ?>
                      </select>
                </div>
                <div class="form-group">
                      <label for="nombre">Tipo de pregunta</label></br>
                      <select class="form-control" name="id_tipo_pregunta">
                        <option value="0">Seleccione:</option>
                        <?php
                          
                          while ($tipo_preguntas = mysqli_fetch_array($resultado)) {
                            echo '<option value="'.$tipo_preguntas['id_tipo_pregunta'].'">'.$tipo_preguntas['nombre'].'</option>';
                          }
                        ?>
                      </select>
                </div>
                <div class="form-group">
                    <label for="nombre">Titulo</label>
                    <input placeholder="Nombre" class="form-control" type="text" name="titulo" id="titulo" required>
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Guardar</button> 
                    <button class="btn btn-danger" onclick="history.back()">Cancelar</button>
                </div>

            </form>
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