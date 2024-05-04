<?php
include("conexion.php");

// Establecer conexión
$conn = connect();

// Verificar si la conexión se realizó con éxito
if ($conn instanceof mysqli) {
    // Verificar si se enviaron datos por el método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los valores del formulario
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $aseguradora_nombre = $_POST["aseguradora"]; // Nombre de la aseguradora desde el formulario

        // Consulta SQL para obtener el ID de la aseguradora
        $sql_aseguradora = "SELECT id_aseguradora FROM Aseguradora WHERE Nombre = '$aseguradora_nombre'";
        $result_aseguradora = $conn->query($sql_aseguradora);

        if ($result_aseguradora && $result_aseguradora->num_rows > 0) {
            $row_aseguradora = $result_aseguradora->fetch_assoc();
            $id_aseguradora = $row_aseguradora["id_aseguradora"];

            // Preparar la consulta SQL para insertar el paciente
            $sql_insert_paciente = "INSERT INTO Pacientes (nombre, apellido, id_aseguradora) VALUES ('$nombre', '$apellido', '$id_aseguradora')";

            // Ejecutar la consulta para insertar el paciente
            if ($conn->query($sql_insert_paciente) === TRUE) {
                echo "Nuevo paciente registrado exitosamente.";
            } else {
                echo "Error al registrar el paciente: " . $conn->error;
            }
        } else {
            echo "Error: No se encontró la aseguradora.";
        }

        // Cerrar la conexión
        $conn->close();
    } else {
        // Si no se enviaron datos por POST, mostrar un mensaje de error
        echo "Error: El formulario no ha sido enviado correctamente.";
    }
} else {
    // Si no se pudo conectar a la base de datos, mostrar un mensaje de error
    echo "Error de conexión: " . $conn;
}
