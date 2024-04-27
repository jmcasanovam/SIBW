<?php
include 'bd.php';
include 'cargar_informacion.php';

$bd = new Database();
// $actividad = rellenarAvistamientoAves();
// $bd->createActividad($actividad);
$palabras = ['gilipollas', 'polla', 'mierda', 'idiota', 'tonto', 'cabron', 'cabrón', 'puta', 'coño', 'joder', 'hostia', 'capullo'];
$bd->rellenarPalabrasProhibidas($palabras);
echo "Palabras prohibidas rellenadas correctamente";

?>