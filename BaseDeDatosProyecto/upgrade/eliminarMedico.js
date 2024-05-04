$(document).ready(function() {
    $('.btn-eliminar').click(function() {
        var id = $(this).data('id_medico');

        $.ajax({
            url: 'eliminarMedico.php',
            type: 'POST',
            data: { id_medico: id },
            success: function(response) {
                if(response == 'success') {
                    alert('Registro eliminado exitosamente');
                    location.reload(); // Recarga la página para actualizar la tabla
                } else {
                    alert('Hubo un error al eliminar el registro');
                }
            }
        });
    });
});
