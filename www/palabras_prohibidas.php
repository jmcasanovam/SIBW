<?php
include 'bd.php';

$dataBase = new Database();
$palabras_prohibidas = $dataBase->getPalabrasProhibidas();
echo json_encode($palabras_prohibidas);
?>
