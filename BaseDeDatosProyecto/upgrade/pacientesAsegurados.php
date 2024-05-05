<?php include "conexion.php" ?>
<?php include "navbar.html" ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Medicas¬Pacientes</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="pacientes.css">

    <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="js/pacientesAsegurados.js"></script>

</head>

<body>


    <main>
        <h1 style="text-align:center">PACIENTES ASEGURADOS</h1>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        <div class="container">
            <table id="pacientesAsegurados" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Id pacientes</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Aseguradora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = connect();
                    $query = "CALL pacientesAsegurados";
                    //Asi cree el procedimiento almacenado en WorkBench
                    //CREATE DEFINER=root@localhost PROCEDURE PacientesAsegurados()
                    //BEGIN
                    //SELECT p.nombre, p.apellido, a.nombre AS aseguradora
                    //FROM Pacientes p
                    //INNER JOIN Aseguradoras a ON p.idaseguradora = a.id_aseguradora
                    //WHERE p.idaseguradora IS NOT NULL;
                    //END
                    $result = $mysqli->query($query);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_paciente"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["apellido"] . "</td>";
                        echo "<td>" . $row["aseguradora"] . "</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>

    
    </main>
</body>

</html>