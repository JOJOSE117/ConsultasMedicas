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
        $fecha = $_POST["fecha"];
        $medico_id = $_POST["medico"];
        $aseguradora_nombre = $_POST["aseguradora"]; // Nombre de la aseguradora desde el formulario

        // Consulta SQL para obtener el ID de la aseguradora
        $sql_aseguradora = "SELECT id_aseguradora FROM Aseguradora WHERE Nombre = '$aseguradora_nombre'";
        $result_aseguradora = $conn->query($sql_aseguradora);

        if ($result_aseguradora && $result_aseguradora->num_rows > 0) {
            $row_aseguradora = $result_aseguradora->fetch_assoc();
            $id_aseguradora = $row_aseguradora["id_aseguradora"];

            // Preparar la consulta SQL para insertar el paciente
            $sql_insert_paciente = "INSERT INTO pacientes (nombre, apellido, id_aseguradora) VALUES ('$nombre', '$apellido', '$id_aseguradora')";
            $conn->query($sql_insert_paciente);

            // Obtener el ID del paciente recién insertado
            $paciente_id = $conn->insert_id;

            // Consulta SQL para insertar la cita
            $sql_insert_cita = "INSERT INTO citas (fecha, id_medico, id_paciente) VALUES ('$fecha', '$medico_id', '$paciente_id')";
            $conn->query($sql_insert_cita);

            // Obtener la fecha de emisión y la cantidad para la factura (misma que la fecha de la cita y cantidad fija)
            $fecha_emision = $fecha;
            $cantidad = 800; // Ejemplo de cantidad fija para la factura

            // Consulta SQL para insertar la factura
            $sql_insert_factura = "INSERT INTO facturas (id_cita, fecha, monto_total) VALUES ('$conn->insert_id', '$fecha_emision', '$cantidad')";
            $conn->query($sql_insert_factura);

            header("Location: pacientes.php");
        }
    }
    // Cerrar la conexión
    $conn->close();
}
