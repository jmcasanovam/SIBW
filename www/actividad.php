<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include "./cargar_informacion.php";
  include 'bd.php';

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  $dataBase = new Database();
  $id = getIdActividad();
  $actividad = $dataBase->getActividad($id);

  echo $twig->render('actividad.html', $actividad);

  $palabras_prohibidas = $dataBase->getPalabrasProhibidas();
  // foreach ($palabras_prohibidas as $palabra) {
  //   echo $palabra . "<br>";
  // }
?>
