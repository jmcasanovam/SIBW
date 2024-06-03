
<?php
// Actividades de ejemplo
$actividades = array(
    array('id' => 1, 'nombre' => 'Actividad 1'),
    array('id' => 2, 'nombre' => 'Actividad 2'),
    array('id' => 3, 'nombre' => 'Actividad 3'),
    array('id' => 4, 'nombre' => 'Actividad 4'),
    array('id' => 5, 'nombre' => 'Actividad 5')
);


sleep(1);

// Devolver los resultados en formato JSON
echo json_encode($actividades);
?>
