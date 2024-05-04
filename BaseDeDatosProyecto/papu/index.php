<html>


    <head>
        <title>CitaFecha</title>
    </head>
    <body>


    <?php
        include("conexion.php");
        $sql="select * from citas";
        $resultado=mysqli_query($conexion,$sql);
    ?>
        <h1>cita fecha</h1>
        <a href="C:\xampp\htdocs\BaseDeDatosProyecto\CitaFecha.html"></a> <br><br>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>No. Control </th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($filas = mysqli_fetch_assoc($resultado)){

                    
                ?>
                <tr>
                    <td> <?php echo $filas ['idcitas'] ?> </td>
                    <td> <?php echo $filas ['fecha'] ?>  </td>
                    <td> <?php echo $filas ['idMedico'] ?>  </td>
                    <td> <?php echo $filas ['idPaciente'] ?></td>
                    
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
        <?php mysqli_close($conexion);?>
    </body>
</html>