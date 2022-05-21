<?php header("Location: login/index.php"); ?>
<?php

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
#fake-captcha {
 

  text-align: center;
  font-family: "Questrial";
  font-size: 22px;
  line-height: 2.25vw;
  white-space: nowrap;
  cursor: pointer;
  color: white;
}

#fake-captcha:hover {
  color: white;
}

#fake-checkbox {
  position: relative;
  float: left;
  margin-right: 1vw;
  width: 2vw;
  height: 2vw;
  border: 2px solid #ccc;
  border-radius: 5px;
  transition: all 0.2s;
  box-sizing: border-box;
}

#fake-checkbox:hover {
  border-color: #aaa;
  background: #eee;
}

#fake-captcha.loading {
  cursor: default;
  color: white;
}

.loading #fake-checkbox {
  border-radius: 50%;
  background: transparent;
  border-color: #888;
  border-width: 12px;
  border-style: inset;
  animation: spin 1s infinite linear;
}

.pass #fake-checkbox {
  background: #c1d9a3;
  border-color: #669f56;
}

.pass #fake-checkbox:before {
  position: relative;
  top: 0;
  left: 0;
  display: block;
  content: "\2713";
  font-size: 2vw;
  color: #275f18;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.fail {
  animation: fail 0.1s 4;
}

@keyframes fail {
  0% { transform: translate(-50%, -50%); }
  25% { transform: translate(-51%, -50%); }
  50% { transform: translate(-50%, -50%); }
  75% { transform: translate(-49%, -50%); }
  100% { transform: translate(-50%, -50%); }
}

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
    max-width: 320px;
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

    <!-- Link hacia el archivo de estilos css -->
   
</head>


<body>


    <div id="contenedor">
        <div id="central">
            <div id="login">
                <div>
                    <img src="imagenes/LogPoderJ.png" height="80 px" width="270 px">
                </div>
                <div class="titulo">Bienvenido</div>

                <div class="loginform">
                    <label class="text-right" for="text">Número de Encuesta</label>
                    <input id="text" type="text" class="form-control form-control-sm" name="ticket" value="" required autofocus>
                </div>
                <div class="custom-select">
                    <label for="cat_oficinas" class="text-right">Oficina</label>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
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
                    <select class="form-control form-control-sm">
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
                    <select class="form-control form-control-sm">
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
           
                <form class="form-signin" action="validacion.php" method="POST">
                <br>
                <span id="reauth-email" class="reauth-email"></span>
              

                <input type="text" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus name="id_usuario">
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="clave">
                
             
             
                <div id="fake-captcha">
          
                 <div id="fake-checkbox"></div>
                        Es usted humano?
                                                </div>
                <div id="remember" class="checkbox">
                    <!--
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                     -->
                </div>
               

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Ingresar</button>

            </form><!-- /form -->
 


   

        </div>
    </div>
 
    <script src="js/load_captcha.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>