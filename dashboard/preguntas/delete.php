<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$mysqli = include_once "../config/conexion.php";
$id_pregunta = $_GET["id"];
$sentencia = $mysqli->prepare("DELETE FROM preguntas WHERE id_pregunta = ?");
$sentencia->bind_param("i", $id_pregunta);
$sentencia->execute();
header("Location: index.php");
