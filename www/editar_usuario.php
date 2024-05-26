<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";
    include 'bd.php';

    session_start();

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    if(isset($_SESSION['email']) && $_SESSION['rol'] == 'superusuario' && isset($_GET['id'])){
        $dataBase = new Database();
        $sesion_iniciada = true;
        $usuario = $dataBase->getUsuario($_GET['id']);
        echo $twig->render('editar_usuario.html', ["usuario" => $usuario, 'sesion_iniciada' => $sesion_iniciada, 'rol' => $_SESSION['rol']]);
    }else{
        echo "No tienes permisos para editar usuarios";
        head("Location: ./perfil.php");
    }


?>