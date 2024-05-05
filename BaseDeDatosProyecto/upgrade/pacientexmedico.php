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
    <script defer src="js/script.js"></script>
    <script defer src="js/radios.js"></script>

</head>

<body>


    <main>
        <h1 style="text-align:center">Pacientes por medico</h1>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        <div class="container">
            <table id="pacientes" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Medico</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                    $mysqli = connect();
                    $query = "CALL obtenerPacientesXMedico()";
                    $result = $mysqli->query($query);


                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Paciente"] . "</td>";
                        echo "<td>" . $row["Medico"] . "</td>";
                   
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>


        

    </main>
</body>

</html>