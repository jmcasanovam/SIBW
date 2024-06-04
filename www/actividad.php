<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include "./cargar_informacion.php";
  include 'bd.php';

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  

  $sesion_iniciada = false;
  $email = "";
  $nombre = "";
  $rol = "";

  session_start();
  if(isset($_SESSION['email'])){
      $sesion_iniciada = true;
      $nombre = $_SESSION['nombre'];
      $email = $_SESSION['email'];
      $rol = $_SESSION['rol'];
  }
    
  $dataBase = new Database();
  $id = getIdActividad();
  $actividad = $dataBase->getActividad($id, $rol);
  $comentarios = $dataBase->getComentarios();
  

  echo $twig->render('actividad.html', ["actividad" => $actividad,"comentarios" => $comentarios, 'sesion_iniciada' => $sesion_iniciada, 'nombre' => $nombre, 'email' => $email, 'id_actividad' => $id]);

?>
