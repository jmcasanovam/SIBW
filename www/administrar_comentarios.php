<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once 'bd.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    session_start();

    if(isset($_SESSION['email'])){
        $bd = new Database();
        $comentarios = $bd->getComentarios();
        $sesion_iniciada = true;
        echo $twig->render('administrar_comentarios.html', ['comentarios' => $comentarios, 'sesion_iniciada' => $sesion_iniciada, 'rol' => $_SESSION['rol']]);
    }else{
        header("Location: login.php");
    }

?>