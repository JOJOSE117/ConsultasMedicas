<?php
include("conexion.php");
$conn = connect();

// Obtener el ID del médico a eliminar
$idMedico = $_POST['id_medico'];

// Eliminar el médico de la base de datos
$sql = "DELETE FROM medicos WHERE id_medico = $idMedico";
$conn->query($sql);

// Cerrar la conexión
$conn->close();

