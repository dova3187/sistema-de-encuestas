<?php
$mysqli = include_once "../config/conexion.php";

$id_usuario = 0;
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_final = $_POST["fecha_final"];
$estado = 0;
$sentencia = $mysqli->prepare("INSERT INTO encuestas
(id_usuario, titulo, descripcion, fecha_inicio, fecha_final, estado)
VALUES
(?, ?, ?, ?, ?, ?)");
$sentencia->bind_param("issssi", $id_usuario, $titulo, $descripcion, $fecha_inicio, $fecha_final, $estado);
$sentencia->execute();
header("Location: index.php");
