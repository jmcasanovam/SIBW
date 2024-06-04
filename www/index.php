<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include "bd.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $sesion_iniciada = false;

    session_start();
    if(isset($_SESSION['email'])){
        $sesion_iniciada = true;
    }
    $rol = "";
    $dataBase = new Database();
    $actividades = $dataBase->getActividades($rol);

    echo $twig->render('principal.html', ['actividades' => $actividades, 'sesion_iniciada' => $sesion_iniciada]);
    
?>