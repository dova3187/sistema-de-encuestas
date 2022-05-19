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
    include("search.php");

    $resultado_encuesta = $mysqli->query("SELECT id_encuesta, titulo, descripcion FROM encuestas");
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
              <li>
              <a href="../preguntas/">Preguntas</a>
              </li>
              <li class="active">
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
        <h2 class="mb-4">Banco de respuestas</h2>
        <div class="row">
            <div class="col-12">
                <form action="#" method="POST">
                <div class="form-group">
                      <label for="nombre">Encuesta</label></br>
                      <select class="form-control" class="form-control" name="search">
                        <option value="0">Seleccione:</option>
                        <?php
                          
                          while ($encuesta = mysqli_fetch_array($resultado_encuesta)) {
                            echo '<option value="'.$encuesta['id_encuesta'].'">'.$encuesta['titulo'].'</option>';
                          }
                        ?>
                      </select>
                </div>
                    <div class="form-group">
                        <button class="btn btn-success" name="save">Buscar</button> 
                        <a class="btn btn-danger" href="../preguntas/index.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
        <h4 class="mb-4">De acuerdo al tipo de encuesta seleccionado, estas son las preguntas registradas:</h4>
        <div class="row">
            <div class="col-12">
                
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Opcion</th>
                            <th>Respuesta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(!empty($respuestas)){
                        	foreach ($respuestas as $respuesta) { ?>
                            <tr>
                                <td><?php echo $respuesta["id_resultado"] ?></td>
                                <td><?php echo $respuesta["id_opcion"] ?></td>
                                <td><?php echo $respuesta["respuesta_texto"] ?></td>

                                <td>
                                    
                                </td>
                            </tr>
                        <?php } }?>
                    </tbody>
                </table>
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