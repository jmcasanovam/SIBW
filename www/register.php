<?php

require_once "/usr/local/lib/php/vendor/autoload.php";

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  include 'bd.php';

  $bd = new Database();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
  
    $bd->crearUsuario(array('nombre' => $nombre, 'email' => $email, 'password' => $pass));
    
    header("Location: index.php");
    
    exit();
  }
  
  echo $twig->render('register.html', []);
?>