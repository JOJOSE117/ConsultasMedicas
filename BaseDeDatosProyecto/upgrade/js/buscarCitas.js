$(document).ready(function() {
    $('#buscarCitas').on('submit', function(e) {
        e.preventDefault();

        var fechaInicio = $('#fechaInicio').val();
        var fechaFin = $('#fechaFin').val();

        $.ajax({
            url: 'citasxfecha.php',
            type: 'POST',
            data: {
                fecha_inicio: fechaInicio,
                fecha_fin: fechaFin
            },
            success: function(response) {
                $('tbody').html(response);
            }
        });
    });
});
