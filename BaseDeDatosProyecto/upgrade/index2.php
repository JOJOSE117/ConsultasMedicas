<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Navbar con Bootstrap</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php include "navbar.html" ?>

    <main>
        <h1 class="titulo"">CONSULTAS MEDICAS</h1>
        <a href="citas.php" class="btn"><button>Citas por intervalo de fecha</button></a>
        <a href="pacientexmedico.php" class="btn"><button>Pacientes por medico asignado</button></a>
        <a href="citasxfecha.php" class="btn"><button>Pagos por factura</button></a>
        <a href="pacientesAsegurados.php" class="btn"><button>Pacientes asegurados</button></a>
        <a href="medicosxespecialidad.php" class="btn"><button>Medicos por especialidad</button></a>
        <a href="citasxfecha.php" class="btn"><button>Facturas por intervalo de fecha y estatus</button></a>
        
        
    </main>
</body>

</html>