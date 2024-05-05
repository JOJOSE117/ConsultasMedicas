$(document).on('click', '#medicos .btn-eliminar', function() {
    // Obtener el ID del médico desde el atributo de datos 'data-id'
    var idMedico = $(this).data('id');
    
    // Enviar una solicitud al servidor para eliminar el médico utilizando jQuery AJAX
    $.ajax({
        url: 'eliminarMedico.php',
        method: 'POST',
        data: { id_medico: idMedico }
    }).done(function() {
        alert("Medico eliminado correctamente"); // Mostrar mensaje de éxito en la consola
// Puedes actualizar la tabla o cualquier otra acción que desees realizar después de eliminar el médico
    });
});