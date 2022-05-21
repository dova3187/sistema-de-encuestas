<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard || admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/application.css">
  </head>
  <style>

</style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="javascript:void(0)">Sistema de Encuestas</a>
       
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--NAVBAR-->
      <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0" style="color: #fff">
        <?php   
        session_start();
          if (isset($_SESSION['u_usuario'])) {
            echo "Bienvenido " . $_SESSION['u_usuario'] . "\t";

            echo "<a href='../cerrar_sesion.php' class='btn btn-danger' style='margin-left: 10px'>Cerrar Sesión</a>";
          } else {
            header("Location: ../index.php");
          }
         ?>
        </form>
      </div>
    </nav>
    <div>
        <!-- Page Content  -->
      <div class="container">
        <div class="row justify-content-around">
              <div class="col-4 center-txt">
                <a href="../encuestas/index.php" >
                  <img src="../images/1_banner.png" class="image">
                </a>
                <h3>Configuración</h3>
              </div>
              <div class="col-4 center-txt">
                <a  href="../graficas/index.php" > 
                  <img  src="../images/2_banner.png" class="image"> 
                </a>
                <h3>Resultados</h3>
              </div>
        </div>
      </div>
        <hr/>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>