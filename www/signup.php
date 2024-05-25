<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include 'bd.php';

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $usuario = ['nombre' => $nombre, 'email' => $email, 'password' => $pass];
    $bd = new Database();
    if ($bd->crearUsuario($usuario)) {
      session_start();
      
      $_SESSION['email'] = $email;
      header("Location: index.php");
      exit();
    }
  }
  
  echo $twig->render('signup.html', []);
?>