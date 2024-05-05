<?php include "conexion.php" ?>
<?php include "navbar.html" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">

    <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

    <script defer src="buscarCitas.js"></script>
</head>

<body>
    <main>

        <h1 style="text-align: center;">BUSCAR CITAS POR RANGO DE FECHAS</h1>

        <div class="container">

            <form action="citasxfecha.php" id="buscarCitas" method="POST">
                <div class="mb-3">
                    <label for="fechaInicio" class="form-label">Fecha inicio</label>
                    <input type="date" class="form-control" id="fechaInicio" name="fecha_inicio" required>
                </div>
                <div class="mb-3">
                    <label for="fechaFin" class="form-label">Fecha limite</label>
                    <input type="date" class="form-control" id="fechaFin" name="fecha_fin" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-secondary">Buscar</button>
                </div>

            </form>



        </div>
    </main>
</body>

</html>