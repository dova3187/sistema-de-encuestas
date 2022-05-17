<?php
$mysqli = include_once "../config/conexion.php";
$id_encuesta = $_POST["id_encuesta"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_final = $_POST["fecha_final"];

$sentencia = $mysqli->prepare("UPDATE encuestas SET
titulo = ?,
descripcion = ?,
fecha_inicio = ?,
fecha_final = ?
WHERE id_encuesta = ?");
$sentencia->bind_param("ssssi", $titulo, $descripcion, $fecha_inicio, $fecha_final, $id_encuesta);
$sentencia->execute();
header("Location: index.php");
