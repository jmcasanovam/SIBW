
<?php
include 'bd.php';

$dataBase = new Database();

$search = $_GET['query'] ?? '';

// Obtener las actividades de la base de datos
$actividades = $dataBase->getActividadesBusquedaGestor($search);



sleep(1);

// Devolver los resultados en formato JSON
echo json_encode($actividades);
?>
