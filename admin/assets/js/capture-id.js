var editarButtons = document.querySelectorAll('.editar-habitacion');
var eliminarButtons = document.querySelectorAll('.eliminar-habitacion');

//Funcion que envia un POST con el id de la habitacion a editar
editarButtons.forEach(function (button) {
    // Obtener el ID de la habitación desde el atributo de datos 'data-id'
    var habitacionId = button.getAttribute('data-id');
    button.addEventListener('click', function () {
        window.location.href = 'roomedit.php?id=' + habitacionId;
    });
});

//Funcion que envia un POST con el id de la habitacion a eliminar
eliminarButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        var fila = $(this).closest('tr');
        // Obtener el ID de la habitación desde el atributo de datos 'data-id'
        var habitacionId = button.getAttribute('data-id');
        $.post('roomdel.php', { id_hab: habitacionId })
            .done(function () {
                fila.remove();
            })
            .fail(function () {
                alert('Error al eliminar la habitacion, Por favor, intentelo de nuevo')
            })
    });
});

