<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$mysqli = include_once "../config/conexion.php";
$id_encuesta = $_GET["id"];
$sentencia = $mysqli->prepare("DELETE FROM encuestas WHERE id_encuesta = ?");
$sentencia->bind_param("i", $id_encuesta);
$sentencia->execute();
header("Location: index.php");
