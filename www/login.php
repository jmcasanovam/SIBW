<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  include 'bd.php';

  $bd = new Database();

  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];
  
    if ($bd->checkLogin($email, $pass)) {
      session_start();
      
      $_SESSION['email'] = $email;
    }
    
    header("Location: index.php");
    
    exit();
  }
  
  echo $twig->render('login.html', []);
?>