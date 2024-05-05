<?php include "conexion.php" ?>
<?php include "navbar.html" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicos</title>
  
    <!-- tablas -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <!-- JQUERY-->
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<h1 style="text-align:center">Medico por especialidad</h1>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        <div class="container">
            <table id="pacientes" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Especialidad</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                    $mysqli = connect();
                    $query = "CALL ObtenerMedicosPorEspecialidad()";
                    $result = $mysqli->query($query);


                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Nombre"] . "</td>";
                        echo "<td>" . $row["Apellido"] . "</td>";
                        echo "<td>". $row["especialidad"]."</td>";
                        // Agregar el botón de eliminar con un formulario para enviar el id del paciente a eliminar
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
         </div>
</main>
</body>

</html>
