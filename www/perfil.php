<?php

//Archivo para mostrar el perfil de un usuario
require_once "/usr/local/lib/php/vendor/autoload.php";

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
  
  require_once 'bd.php';

  session_start();

  if(isset($_SESSION['email'])){
    $bd = new Database();
    // $usuario = $bd->getUser($_SESSION['email']);
    $usuario = ['email' => $_SESSION['email'], 'nombre' => $_SESSION['nombre'], 'rol' => $_SESSION['rol']];
    $sesion_iniciada = true;
    echo $twig->render('perfil.html', ['usuario' => $usuario, 'sesion_iniciada' => $sesion_iniciada]);
  }else{
    header("Location: login.php");
  }

?>