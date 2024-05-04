<?php
include("conexion.php");
$conn = connect();

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$especialidad = $_POST["especialidad"];

$sql_especialidad = "SELECT id_especialidad FROM especialidad WHERE Nombre = '$especialidad'";
$result_especialidad = $conn->query($sql_especialidad);

if ($result_especialidad && $result_especialidad->num_rows > 0) {
    $row_especialidad = $result_especialidad->fetch_assoc();
    $id_especialidad = $row_especialidad["id_especialidad"];

    // Preparar la consulta SQL para insertar el paciente
    $sql_insert_medico = "INSERT INTO medicos (Nombre, Apellido, id_especialidad) VALUES ('$nombre','$apellido','$id_especialidad')";

    // Ejecutar la consulta para insertar el paciente
    if ($conn->query($sql_insert_medico) === TRUE) {
        echo "Nuevo medio registrado exitosamente.";
    } else {
        echo "Error al registrar el medico: " . $conn->error;
    }
} else {
    echo "Error: No se encontró la especialidad.";
}

// Cerrar la conexión
$conn->close();
