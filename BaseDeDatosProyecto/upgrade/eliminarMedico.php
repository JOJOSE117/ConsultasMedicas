<?php
include("conexion.php");
$id = $_POST["id_medico"];

$mysqli = connect();
$res = $mysqli->query("DELETE FROM medicos WHERE id_medico = $id");


