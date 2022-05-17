<?php
$mysqli = include_once "../config/conexion.php";
$id_pregunta = $_POST["id_pregunta"];
$titulo = $_POST["titulo"];


$sentencia = $mysqli->prepare("UPDATE preguntas SET
titulo = ?
WHERE id_pregunta = ?");
$sentencia->bind_param("si", $titulo, $id_pregunta);
$sentencia->execute();
header("Location: index.php");
