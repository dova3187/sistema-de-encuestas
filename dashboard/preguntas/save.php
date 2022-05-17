<?php
$mysqli = include_once "../config/conexion.php";

$id_encuesta = $_POST["id_encuesta"];
$titulo = $_POST["titulo"];
$id_tipo_pregunta = $_POST["id_tipo_pregunta"];

$sentencia = $mysqli->prepare("INSERT INTO preguntas
(id_encuesta, titulo, id_tipo_pregunta)
VALUES
(?, ?, ?)");
$sentencia->bind_param("isi", $id_encuesta, $titulo, $id_tipo_pregunta);
$sentencia->execute();
header("Location: index.php");
