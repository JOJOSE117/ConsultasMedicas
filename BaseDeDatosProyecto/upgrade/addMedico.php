<?php
include("conexion.php");
$conn = connect();

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$especialidad = $_POST["especialidad"];


$sql_especialidad = "SELECT id_especialidad FROM especialidad WHERE Nombre = '$especialidad'";
$result_especialidad = $conn->query($sql_especialidad);
$row_especialidad = $result_especialidad->fetch_assoc();
$id_especialidad = $row_especialidad["id_especialidad"];

$sql_insert_medico = "INSERT INTO medicos (Nombre, Apellido, id_especialidad) VALUES ('$nombre','$apellido','$id_especialidad')";

if ($conn->query($sql_insert_medico) === TRUE) {
    echo "Nuevo médico registrado exitosamente.";
} else {
    echo "Error al registrar el médico: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
