<?php
include('../dashboard/config/conexion.php');
include('../dashboard/config/recaptchalib.php');
$datacat_oficinasSelect        = $mysqli->query("SELECT num_oficina,oficina,ubicacion FROM  cat_oficinas");
$datacat_status_aniosSelect       = $mysqli->query("SELECT * FROM  cat_status_anios ORDER BY anio ASC LIMIT 10");
$datacat_etapaSelect        = $mysqli->query("SELECT * FROM  cat_etapa ORDER BY etapa DESC LIMIT 5");
?>
<html lang="es">

<head>

    <meta charset="utf-8">
    <title> Formulario de Acceso </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Videojuegos & Desarrollo">
    <meta name="description" content="Muestra de un formulario de acceso en HTML y CSS">
    <meta name="keywords" content="Formulario Acceso, Formulario de LogIn">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/invitado.css">
    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>

    <script type="text/javascript">
        <body class="d-flex flex-column " >

    </script>
</head>
<body>

    <div id="contenedor">
   
        <div id="central">
            <div id="login">
         
                <div>
                    <img src="../imagenes/LogPoderJ.png" height="80" width="270">
                </div>
                <div class="titulo">Bienvenido</div>
            <form action="encuesta.php" method="post">
                <div class="loginform">
                    <label class="text-right" for="text">Número de Encuesta</label>
                    <input id="text" type="text" class="form-control form-control-sm" name="numero_encuesta" value="" required autofocus>
                </div>
                <div class="custom-select">
                   
                    <select class="form-select form-select-lg mb-3 width-100" aria-label="form-select-lg example" name="oficina">
                    <option value="">Seleccione la oficina</option>
                        <?php
                        while ($dataSelect = mysqli_fetch_array($datacat_oficinasSelect)) { ?>
                            <option value="<?php echo $dataSelect['num_oficina']; ?>">
                                <?php echo($dataSelect['oficina']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="custom-select">
                    <label for="cat_status_anio" class="text-right">Periodo</label>
                    <select class="form-select form-select-lg mb-3 width-100" name="periodo">
                        <option value="">Seleccione el periodo</option>

                        <?php
                        while ($dataSelect = mysqli_fetch_array($datacat_status_aniosSelect)) { ?>

                            <option value="<?php echo $dataSelect["anio"]; ?>">
                                <?php echo($dataSelect["anio"]); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="custom-select">
                    <label for="cat_etapa" class="text-right">Etapa</label>
                    <select class="form-select form-select-lg mb-3 width-100" name="etapa">
                        <option value="">Seleccione la etapa
                        </option>

                        <?php
                        while ($dataSelect = mysqli_fetch_array($datacat_etapaSelect)) { ?>

                            <option value="<?php echo $dataSelect["id_etapa"]; ?>">
                                <?php echo($dataSelect["etapa"]); ?>
                            </option>
                        <?php } ?>
                    </select>
             
                </div>
           

                <!-- is this necessary??
                <form class="form-signin" action="validacion.php" method="POST">
                <br>
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus name="id_usuario">
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="clave">
                <div id="remember" class="checkbox">
                    <!--
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                     
                </div>  -->
                
                </br></br><div class="g-recaptcha" data-sitekey="6LfB4LwfAAAAAKOuCqL-8Wl4t9N2-ONgzHSXre27"></div>

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Ingresar como invitado</button>

                <a type="button" class="login button" href="../login/index.php">Tengo una cuenta</a>

            </form><!-- /form -->
            </div>
        </div>
    </div>

</body>
</html>