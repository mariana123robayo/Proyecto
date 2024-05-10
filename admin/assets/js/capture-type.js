// capture-type.js

$(document).ready(function() {
    $('#tipoHabitacion').change(function() {
        var selectedType = $(this).val();

        $.ajax({
            url: 'reservation.php',
            method: 'POST',
            data: { selectedType: selectedType },
            success: function(response) {
                console.log('Respuesta del servidor ejemplo:', response);
            },
            error: function(xhr, status, error) {
                console.error('Error al enviar el valor:', error);
            }
        });
    });
});

