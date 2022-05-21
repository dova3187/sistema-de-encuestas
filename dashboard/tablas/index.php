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

    $resultado_oficina = $mysqli->query("SELECT num_oficina, oficina, ubicacion FROM cat_oficinas");

    $resultado_etapa = $mysqli->query("SELECT id_etapa, etapa FROM cat_etapa");
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

            </br><h4>Datos</h4>
            <ul class="list-unstyled components mb-5">
              <li>
                  <a href="../graficas/">Gráficas</a>
              </li>
              <li class="active">
              <a href="../tablas/">Tablas</a>
              </li>
              <li>
              <a href="../indicadores/">Indicadores</a>
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
        <h2 class="mb-4">Nivel de satisfacción</h2>
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
                      <label for="nombre">Oficina</label></br>
                      <select class="form-control" class="form-control" name="search_oficina">
                        <option value="0">Seleccione:</option>
                        <?php
                          
                          while ($oficina = mysqli_fetch_array($resultado_oficina)) {
                            echo '<option value="'.$oficina['num_oficina'].'">'.$oficina['oficina'].'</option>';
                          }
                        ?>
                      </select>
                </div>
                <div class="form-group">
                      <label for="nombre">Tipo de entrevista</label></br>
                      <select class="form-control" class="form-control" name="search_etapa">
                        <option value="0">Seleccione:</option>
                        <?php
                          
                          while ($etapa = mysqli_fetch_array($resultado_etapa)) {
                            echo '<option value="'.$etapa['id_etapa'].'">'.$etapa['etapa'].'</option>';
                          }
                        ?>
                      </select>
                </div>
                    <div class="form-group">
                        <button class="btn btn-success" name="save">Buscar</button> 
                        <a class="btn btn-warning my-2" href="../menu">Menú principal</a>
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
                            <th>Encuesta</th>
                            <th>Número oficina</th>
                            <th>Año</th>
                            <th>Etapa</th>
                            <th>Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(!empty($respuestas)){
                        	foreach ($respuestas as $respuesta) { ?>
                            <tr>
                                <td><?php echo $respuesta["id_resultado"] ?></td>
                                <td><?php echo $respuesta["id_encuesta"] ?></td>
                                <td><?php echo $respuesta["num_oficina"] ?></td>
                                <td><?php echo $respuesta["id_anios"] ?></td>
                                <td><?php echo $respuesta["id_etapa"] ?></td>
                                <td><?php echo ($respuesta["id_tipo_pregunta"]!=4) ? $respuesta["valor"] : $respuesta["respuesta_texto"]   ?></td>
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