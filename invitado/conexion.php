<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "encuesta";

// Creamos la conexión
$con = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($con,"utf8");

// Verificamos la conexión
if ($con->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
	// echo "Conexión exitosa wefduwehhur";
}


$sqlcat_oficinas         = ("SELECT * FROM  cat_oficinas ORDER BY oficina ASC LIMIT 20");
$datacat_oficinasSelect  = mysqli_query($con, $sqlcat_oficinas);

$sqlcat_status_anios         = ("SELECT * FROM  cat_status_anios ORDER BY anio ASC LIMIT 10");
$datacat_status_aniosSelect  = mysqli_query($con, $sqlcat_status_anios);

$sqlcat_etapa         = ("SELECT * FROM  cat_etapa ORDER BY etapa DESC LIMIT 5");
$datacat_etapaSelect  = mysqli_query($con, $sqlcat_etapa);
?>

