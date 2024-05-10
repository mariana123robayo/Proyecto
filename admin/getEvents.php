<?php
include('db.php'); 

// Assuming you have a database connection established in $con

header('Content-Type: application/json');

// Get the room type from the query parameter
$tipoHabitacion2 = isset($_GET['tipoHabitacion']) ? $_GET['tipoHabitacion'] : '';

// Prepare and execute the query
$sql2 = "SELECT * FROM roombook WHERE TRoom = ?";
$stmt = $con->prepare($sql2);
$stmt->bind_param("s", $tipoHabitacion2);
$stmt->execute();
$result = $stmt->get_result();

$events = [];
while ($row = $result->fetch_assoc()) {
    // Map your database columns to event object properties
    $events[] = [
        'id' => $row['id'],
        'title' => $row['FName'] . " " . $row['LName'],
        'start' => $row['cin'],
        'end' => $row['cout'],
        'resourceId' => $row['Bed'] // if you use resource views
    ];
}

echo json_encode($events);

?>