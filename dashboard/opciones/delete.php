<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$mysqli = include_once "../config/conexion.php";
$id_opcion = $_GET["id"];
$id_pregunta = $_GET["id_pregunta"];
$sentencia = $mysqli->prepare("DELETE FROM opciones WHERE id_opcion = ?");
$sentencia->bind_param("i", $id_opcion);
$sentencia->execute();
header("Location: form.php?id_pregunta={$id_pregunta}");;
