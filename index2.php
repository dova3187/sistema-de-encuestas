<?php
require_once "recaptchalib.php";
$servername = "localhost";
$username = "php";
$password = "password";
$dbname = "sistema_encuestas";

// Creamos la conexión
$con = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($con,"utf8");

// Verificamos la conexión
if ($con->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
	// echo "Conexión exitosa";
}


$sqlcat_oficinas         = ("SELECT * FROM  cat_oficinas ORDER BY oficina ASC LIMIT 20");
$datacat_oficinasSelect  = mysqli_query($con, $sqlcat_oficinas);

$sqlcat_status_anios         = ("SELECT * FROM  cat_status_anios ORDER BY anio ASC LIMIT 10");
$datacat_status_aniosSelect  = mysqli_query($con, $sqlcat_status_anios);

$sqlcat_etapa         = ("SELECT * FROM  cat_etapa ORDER BY etapa DESC LIMIT 5");
$datacat_etapaSelect  = mysqli_query($con, $sqlcat_etapa);

?>



<style>

body {
    font-family: 'Overpass', sans-serif;
    font-weight: normal;
    font-size: 100%;
    color: #144653;
    
    margin: 0;
    background-color: #144653;
}

#contenedor {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 100px;
    margin: 0;
    padding: 0;
    min-width: 100vw;
    min-height: 100vh;
    width: 100%;
    height: 100%;
}

#central {
    max-width: 350px;
    width: 100%;
}

.titulo {
    font-size: 250%;
    color:#bbe1fa;
    text-align: center;
    margin-bottom: 20px;
}

#login {
    width: 100%;
    padding: 50px 30px;
    background-color: #557982;
    margin-top: 100px;
    -webkit-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    -moz-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-radius: 3px 3px 3px 3px;
    
    box-sizing: border-box;
}

#login input {
    font-family: 'Overpass', sans-serif;
    font-size: 110%;
    color: #1b262c;
    
    display: block;
    width: 100%;
    height: 40px;
    
    margin-bottom: 10px;
    padding: 5px 5px 5px 10px;
    
    box-sizing: border-box;
    
    border: none;
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-radius: 3px 3px 3px 3px;
}

#login input::placeholder {
    font-family: 'Overpass', sans-serif;
    color: #E4E4E4;
}

#login button {
    font-family: 'Overpass', sans-serif;
    font-size: 110%;
    color:#1b262c;
    width: 100%;
    height: 40px;
    border: none;
    
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-radius: 3px 3px 3px 3px;
    
    background-color: #7F9174;
    
    margin-top: 10px;
}

#login button:hover {
    background-color: #0f4c75;
    color:#bbe1fa;
}

.pie-form {
    font-size: 90%;
    text-align: center;    
    margin-top: 15px;
}

.pie-form a {
    display: block;
    text-decoration: none;
    color: #bbe1fa;
    margin-bottom: 3px;
}

.pie-form a:hover {
    color: #0f4c75;
}

.inferior {
    margin-top: 10px;
    font-size: 90%;
    text-align: center;
}

.inferior a {
    display: block;
    text-decoration: none;
    color: #bbe1fa;
    margin-bottom: 3px;
}

.inferior a:hover {
    color: #3282b8;
}
body {
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-family: sans-serif;
}

* {
    box-sizing: border-box;
}

.custom-select {
    position: relative;
    display: inline-block;
    font-size: 14px;
    color: #888;
    margin-top: 25px;
}

.custom-select select {
    display: block;
    width: 250px;
    min-height: 35px;
    background: #cbe7ff;
    border-radius: 3px;
    border: 2px solid #2196F3;
    outline: none;
    padding: 0 20px 0 10px;
    margin-top: 5px;
    cursor: pointer;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    -ms-appearance: none;
}

.custom-select::after {
    content: '';
    border-width: 5px;
    border-style: solid;
    border-color: transparent;
    border-top-color: #222;
    display: inline-block;
    border-radius: 2px;
    position: absolute;
    right: 10px;
    bottom: 10px;
}

.custom-select .selector-options {
    list-style: none;
    padding: 5px 0;
    margin: 0;
    background: #11436b;
    color: #fff;
    border-radius: 4px;
    z-index: 1;
    width: 96%;
    position: absolute;
    left: 2%;
    top: 35%;
}

.custom-select .selector-options li {
    height: 35px;
    display: flex;
    align-items: center;
    padding: 0 15px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.custom-select .selector-options li:hover {
    background: #03A9F4;
}
a.button {
font-family: 'Overpass', sans-serif;
    font-size: 110%;
    color: #1b262c;
    width: 100%;
    height: 40px;
    border: none;
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-radius: 3px 3px 3px 3px;
    background-color: #7F9174;
    margin-top: 10px;
    text-decoration:none
}
a.button:hover {
    background-color: #0f4c75;
    color:#bbe1fa;
}

.button {
    appearance: auto;
    writing-mode: horizontal-tb !important;
    font-style: ;
    font-variant-ligatures: ;
    font-variant-caps: ;
    font-variant-numeric: ;
    font-variant-east-asian: ;
    font-weight: ;
    font-stretch: ;
    font-size: ;
    font-family: ;
    text-rendering: auto;
    color: buttontext;
    letter-spacing: normal;
    word-spacing: normal;
    line-height: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: center;
    align-items: flex-start;
    cursor: default;
    box-sizing: border-box;
    background-color: -internal-light-dark(rgb(239, 239, 239), rgb(59, 59, 59));
    margin: 0em;
    padding: 1px 6px;
    border-width: 2px;
    border-style: outset;
    border-color: buttonborder;
    border-image: initial;
}
</style>
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

    <link rel="stylesheet" href="css/styles.css">
    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
    <!-- Link hacia el archivo de estilos css -->

    <script type="text/javascript">
        <body class="d-flex flex-column " >

    </script>
</head>
<body>

    <div id="contenedor">
        <div id="central">
            <div id="login">
                <div>
                    <img src="imagenes/LogPoderJ.png" height="80" width="270">
                </div>
                <div class="titulo">Bienvenido</div>
            <form action="encuesta.php" method="post">
                <div class="loginform">
                    <label class="text-right" for="text">Número de Encuesta</label>
                    <input id="text" type="text" class="form-control form-control-sm" name="numero_encuesta" value="" required autofocus>
                </div>
                <div class="custom-select">
                    <label for="cat_oficinas" class="text-right">Oficina</label>
                    <select class="form-select form-select-lg mb-3 width-100" aria-label="form-select-lg example" name="oficina">
                    <option value="">Seleccione la oficina</option>
                        <?php
                        while ($dataSelect = mysqli_fetch_array($datacat_oficinasSelect)) { ?>
                            <option value="<?php echo $dataSelect["num_oficina"]; ?>">
                                <?php echo($dataSelect["oficina"]); ?>
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

                <a type="button" class="login button" href="login.php">Tengo una cuenta</a>

            </form><!-- /form -->
            </div>
        </div>
    </div>

</body>
</html>