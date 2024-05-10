<?php
include('db.php'); 


if (isset($_GET['tipoHabitacion'])) {
    $tipoHabitacion = $con->real_escape_string($_GET['tipoHabitacion']);  

    $query = "SELECT bedding AS title FROM room WHERE type = '$tipoHabitacion'";
    $result = $con->query($query);

    $resources = array();
    while ($row = $result->fetch_assoc()) {
        $resources[] = $row;  
        
    }

    echo json_encode($resources);
} else {
    
    echo json_encode(array('error' => 'Tipo de habitación no proporcionado'));
}


?>
