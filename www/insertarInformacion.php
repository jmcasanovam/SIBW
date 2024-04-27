<?php
include 'bd.php';
include 'cargar_informacion.php';

$bd = new Database();
$actividad = rellenarAvistamientoAves();
$bd->createActividad($actividad);
echo "Actividad insertada correctamente";

?>