<?php
// Verifica si se ha recibido el parámetro 'id_hab' en la solicitud POST
if (isset($_POST['id_hab'])) {

    include('db.php');

    $id_habitacion = $_POST['id_hab'];
    $sql = "DELETE FROM `room` WHERE id = '$id_habitacion'";

    if (mysqli_query($con, $sql)) {
        echo json_encode(array('success' => true, 'message' => 'Habitación eliminada exitosamente'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error al eliminar la habitación'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'No se proporcionó el ID de la habitación'));
}
?>