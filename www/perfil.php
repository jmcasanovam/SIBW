<?php

//Archivo para mostrar el perfil de un usuario
require_once "/usr/local/lib/php/vendor/autoload.php";

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
  
  require_once 'bd.php';

  session_start();

  if(isset($_SESSION['email'])){
    $bd = new Database();
    $usuario = $bd->getUser($_SESSION['email']);
    echo $twig->render('perfil.html', ['usuario' => $usuario]);
  }else{
    header("Location: login.php");
  }

?>