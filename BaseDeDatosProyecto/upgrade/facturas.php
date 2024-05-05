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
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

</head>

<body>
    <main>

        <h1 style="text-align: center;">FACTURAS</h1>

        <div class="container">


            <table id="citasxfecha" class="table table-striped">
                <thead>
                    <tr>
                        <th>Id Factura</th>
                        <th>Cantidad</th>
                        <th>Saldo Pendiente</th>
                        <th>Id cita</th>
                        <th>Fecha</th>
                        <th>Estado del pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = connect();
                    $query = "SELECT * 
                    FROM facturas";
                    $result = $mysqli->query($query);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_factura"] . "</td>";
                        echo "<td>" . $row["monto_total"] . "</td>";
                        echo "<td>" . $row["saldo_pendiente"] . "</td>";
                        echo "<td>" . $row["id_cita"] . "</td>";
                        echo "<td>" . $row["fecha"] . "</td>";
                        echo "<td>" . $row["estado_pago"] . "</td>";
                        echo "<td> <i class='far fa-credit-card'  data-bs-toggle='modal' data-bs-target='#modalPagos'> &nbsp; &nbsp;</i> <i class='far fa-calendar'  data-bs-toggle='modal' data-bs-target='#modalHistorial'></i></td>";
                    }
                    ?>




                </tbody>
            </table>
        </div>

        <div class="modal fade" id="modalPagos" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalPagos">Nuevo Pago</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <form action="pagoFactura.php" method="POST">

                                <h3>Saldo Pendiente: <?php     ?></h3>
                                <label for="pago">Monto a pagar</label>
                                <div class="input-group">
                                    <div class="input-group-text">$</div>
                                    <input type="number" class="form-control" id="pago" name=
                                    "pago" required min="1">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Realizar pago</button>
                                
                            </form>
                            
                        </div>
                </div>
            </div>
        </div>

    </main>
</body>

</html>