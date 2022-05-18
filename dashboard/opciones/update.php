<?php
$mysqli = include_once "../config/conexion.php";
$id_opcion = $_POST["id_opcion"];
$id_pregunta = $_POST["id_pregunta"];
$valor = $_POST["valor"];

$sentencia = $mysqli->prepare("UPDATE opciones SET
valor = ?
WHERE id_opcion = ?");
$sentencia->bind_param("si", $valor, $id_opcion);
$sentencia->execute();
header("Location: form.php?id_pregunta={$id_pregunta}");;
