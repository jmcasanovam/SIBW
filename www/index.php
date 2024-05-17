<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include "bd.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    session_start();
    if(!isset($_SESSION['email'])){
        echo "No has iniciado sesion";
    }
    $dataBase = new Database();
    $actividades = $dataBase->getActividades();

    echo $twig->render('principal.html', ['actividades' => $actividades]);
    
?>