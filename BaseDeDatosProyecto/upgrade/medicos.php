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
    <script defer src="js/medicos.js"></script>
    <script defer src="eliminarMedico.js"></script>
</head>

<body>

    <main>
        <h1 style="text-align: center">MEDICOS</h1>

        <div class="container">


            <table id="medicos" class="table table-striped" style="width:100%">

                <thead>
                    <tr>
                        <th>Id_Medico</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Especialidad</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = connect();
                    $query = "SELECT m.id_medico, m.Nombre, m.Apellido, e.Nombre AS medico_especialidad
                            FROM medicos m LEFT JOIN especialidad e ON m.id_especialidad = e.id_especialidad";
                    $result = $mysqli->query($query);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_medico"] . "</td>";
                        echo "<td>" . $row["Nombre"] . "</td>";
                        echo "<td>" . $row["Apellido"] . "</td>";
                        echo "<td>" . $row["medico_especialidad"] . "</td>";
                        echo "<td> <button class='btn btn-sm btn-danger btn-eliminar' data-id='" . $row["id_medico"] . "'>Eliminar </button></td>";

                       echo "</tr>";
                    }
                    ?>
                   
                   
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addMedico">Agregar medico</button>
        </div>



        <div class="modal fade" id="addMedico" tabindex="-1" aria-labelledby="medico" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="medico">Nuevo Medico</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <!-- FORMULARIO -->
                        <form action="addMedico.php" method="POST">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>

                            <div class="mb-3">
                                <label for="especialidad" class="form-label">Especialidad: </label>
                                <select class="form-select" aria-label="Default select example" name="especialidad" required>
                                    <option selected></option>
                                    <option value="cardiologia">Cardiologia</option>
                                    <option value="pediatria">Pediatria</option>
                                    <option value="neurologia">Neurologia</option>
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