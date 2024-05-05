<?php 
include("conexion.php");

// Obtener el monto del pago enviado por el formulario
$pago = $_POST["pago"];

// Establecer la conexión
$mysqli = connect();

// Consulta para calcular el nuevo saldo pendiente
$query = "SELECT calcularSaldoPendiente($pago) AS nuevo_saldo FROM facturas";


// Ejecutar la consulta
$result = $mysqli->query($query);

if ($result) {
    // Obtener el resultado de la consulta
    $row = $result->fetch_assoc();

    // Nuevo saldo pendiente
    $nuevo_saldo = $row['nuevo_saldo'];


    // Insertar el nuevo saldo pendiente en la tabla facturas
    $insert_query = "INSERT INTO facturas (saldo_pendiente) VALUES ('$nuevo_saldo')";
    $insert_result = $mysqli->query($insert_query);

    // Verificar si la inserción fue exitosa
    if ($insert_result) {
        echo "Pago registrado correctamente. Nuevo saldo pendiente: $nuevo_saldo";
    } else {
        echo "Error al registrar el pago. Por favor, inténtalo de nuevo.";
    }
} else {
    echo "Error al calcular el nuevo saldo pendiente.";
}

// Cerrar la conexión
$mysqli->close();


