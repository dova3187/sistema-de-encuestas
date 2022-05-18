<?php
$mysqli = include_once "../config/conexion.php";

//$id_encuesta = $_POST["id_encuesta"];
$id_pregunta = $_POST["id_pregunta"];
$valor = $_POST["valor"];

$sentencia = $mysqli->prepare("INSERT INTO opciones
(id_pregunta, valor)
VALUES
(?, ?)");
$sentencia->bind_param("is", $id_pregunta, $valor);
$sentencia->execute();
header("Location: form.php?id_pregunta={$id_pregunta}");
