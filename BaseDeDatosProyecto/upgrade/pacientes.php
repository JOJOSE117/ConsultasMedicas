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
        <h1 style="text-align:center">PACIENTES</h1>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        <div class="container">
            <table id="pacientes" class="table table-striped" style="width:100%">
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
                    $query = "SELECT p.id_paciente, p.nombre, p.apellido, a.nombre AS aseguradora_nombre
                                FROM pacientes p
                                LEFT JOIN aseguradora a ON p.id_aseguradora = a.id_aseguradora ";
                    $result = $mysqli->query($query);


                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_paciente"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["apellido"] . "</td>";
                        echo "<td>" . ($row["aseguradora_nombre"] ? $row["aseguradora_nombre"] : "No asegurado") . "</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>


        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addPaciente">Agregar paciente</button>
        </div>

        <div class="modal fade" id="addPaciente" tabindex="-1" aria-labelledby="paciente" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="paciente">Nuevo Paciente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <!-- FORMULARIO -->
                        <form action="aggPaciente.php" method="post">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>

                            <div class="mb-3">
                                <label for="asegurado" class="form-label">Asegurado: </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="asegurado" id="aseguradoSi" value="Si">
                                    <label class="form-check-label" for="aseguradoSi">Si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="asegurado" id="aseguradoNo" value="No" checked>
                                    <label class="form-check-label" for="aseguradoNo">No</label>
                                </div>
                            </div>
                            <div class="mb-3" id="selectDiv" style="display: none;">
                                <label for="aseguradora">Aseguradora</label>
                                <select class="form-select" aria-label="Default select example" name="aseguradora">
                                    <option selected>MazSeguro</option>
                                    <option value="SeguroPro">SeguroPro</option>

                                </select>
                            </div>

                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>