<?php
include('db.php'); 


header('Content-Type: application/json');

$tipoHabitacion2 = isset($_GET['tipoHabitacion']) ? $_GET['tipoHabitacion'] : '';

$sql2 = "SELECT * FROM roombook WHERE TRoom = ? and stat = 'Conform'" ;
$stmt = $con->prepare($sql2);
$stmt->bind_param("s", $tipoHabitacion2);
$stmt->execute();
$result = $stmt->get_result();

$events = [];
while ($row = $result->fetch_assoc()) {
    
    $events[] = [
        'id' => $row['id'],
        'title' =>'Reservado',
        'start' => $row['cin'],
        'end' => $row['cout'],
        'resourceId' => $row['Bed'] 
    ];
}

echo json_encode($events);

?>