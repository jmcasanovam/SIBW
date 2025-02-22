<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    require_once 'bd.php';

    session_start();

    if(isset($_SESSION['email'])){
        $bd = new Database();
        $usuario = $bd->getUser($_SESSION['email']);
        $sesion_iniciada = true;
        echo $twig->render('editar_perfil.html', ['usuario' => $usuario, 'sesion_iniciada' => $sesion_iniciada]);
    }else{
        header("Location: login.php");
    }

?>