<?php
  session_start();   // Necesitamos una sesion
  require_once "recaptchalib.php";
  if(isset($SESSION['u_usuario'])){  // comparamos si existe
    header("Location: validacion.php"); // si existe, lo redireccionamos a sesion.php
  }
  else{
    session_destroy();  // si no existe, destruimos sesion
  }
?>﻿

<style>

body, html {
    height: 100%;
    background-repeat: no-repeat;
    background-color: #000000;
  
}

.card-container.card {
  width:35%;
    padding: 50px 30px;
    
    
    -webkit-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    -moz-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-radius: 3px 3px 3px 3px;
    
    box-sizing: border-box;
}

/*
 * Card component
 */

 .profile-img-card {
    width: 400px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 0;
  
}


.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
    background-color: #557982;
}
.card {
  background-color: black;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    background-color: #557982 !important;
}

.profile-img-card {
    width: 200px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 0%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: rgb(104, 145, 162);
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: #33AAFF;

}

.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: rgb(12, 97, 33);
}

</style>
<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
  <title>Sistema de encuestas</title>
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Sistema de Encuestas</a>
      <!--
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
      </button>
      -->

      <!--NAVBAR-->
      <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav mr-auto">
          <!--
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="javascript:void(0)">Disabled</a>
          </li>
          -->
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <!--
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          -->
          <!--
          <a class="btn btn-primary" href="login.html" role="button">Ingresar</a>
          -->
        </form>
      </div>
    </nav>

    <!--LOGIN-->

     <div class="container "  >
        <div class="card card-container">
            <img src="imagenes/LogPoderJ.png" height="80">
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="validacion.php" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus name="id_usuario">
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="clave">
                <div id="remember" class="checkbox">
                    <!--
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                     -->
                </div>
                <div class="g-recaptcha" data-sitekey="6LfB4LwfAAAAAKOuCqL-8Wl4t9N2-ONgzHSXre27"></div>
                </br><button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Ingresar</button>

                <a type="button" class="btn btn-lg btn-primary btn-block btn-signin" href="index2.php" role="button" >Invitado</a>


                
                <!--
                  <input type="submit" name="" value="Ingresar">
                -->
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->

    <!-- Footer -->
    <footer class="page-footer font-small" style="background-color: #343A40; color: #FFF; margin-top: 150px">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2022 Todos los derechos reservados
        <br>
       
      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>