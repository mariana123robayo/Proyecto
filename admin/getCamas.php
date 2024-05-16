<?php
include('db.php'); 

if (isset($_POST['tipoHabitacion'])) {
    
    $tipoHabitacion = $_POST['tipoHabitacion'];

    
    $sql_bed = "SELECT DISTINCT bedding FROM room WHERE type = '$tipoHabitacion'";
    $result_bed = $con->query($sql_bed);

    
    if ($result_bed->num_rows > 0) {
        
        $options = '<option value=""></option>';
        while ($row_bed = $result_bed->fetch_assoc()) {
            $bed = $row_bed['bedding'];
            $options .= "<option value='$bed'>$bed</option>";
        }
        
        echo $options;
    } else {
        
        echo "<option value=''>No hay opciones disponibles</option>";
    }
} else {
   
    echo "<option value=''>Error: No se recibió el tipo de habitación</option>";
}

?>
