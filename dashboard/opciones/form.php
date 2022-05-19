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


    $id_pregunta = $_GET['id_pregunta']; //come from GET

    $resultado = $mysqli->query("SELECT id_pregunta, id_encuesta, titulo, id_tipo_pregunta FROM preguntas LIMIT 1");
    $pregunta = $resultado->fetch_all(MYSQLI_ASSOC);


    $resultado_opciones = $mysqli->query("SELECT id_opcion, id_pregunta, valor FROM opciones WHERE id_pregunta=$id_pregunta");
    $opciones = $resultado_opciones->fetch_all(MYSQLI_ASSOC);

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

        <h2 class="mb-4">Registrar opción</h2>
        <div class="row">
            <div class="col-12">
                <form action="save.php" method="POST">
                    <div class="form-group">
                          <label for="nombre">Pregunta</label></br>
                          <input placeholder="" class="form-control" type="text" value="<?php echo $pregunta[0]['titulo']?>"readonly>
                          <input type="hidden" name="id_pregunta" value="<?php echo $id_pregunta?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Valor</label>
                        <input placeholder="Valor" class="form-control" type="text" name="valor" id="valor" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Guardar</button> 
                        <a class="btn btn-danger" href="../preguntas/index.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
        <h2 class="mb-4">Opciones creadas</h2>
        <div class="row">
            <div class="col-12">
                
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Valor</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($opciones as $opcion) { ?>
                            <tr>
                                <td><?php echo $opcion["id_opcion"] ?></td>
                                <td><?php echo $opcion["valor"] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $opcion["id_opcion"] ?>&id_pregunta=<?php echo $id_pregunta?>">Editar</a>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?php echo $opcion["id_opcion"] ?>&id_pregunta=<?php echo $id_pregunta?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
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