<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "./cargar_informacion.php";
    include 'bd.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $dataBase = new Database();
    $id = getIdActividad();
    $rol = "";
    $actividad = $dataBase->getActividad($id, $rol);

    echo $twig->render('imprimir.html', ["actividad" => $actividad]);
    
?>