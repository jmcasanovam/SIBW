<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "./cargar_informacion.php";
    include 'bd.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $dataBase = new Database();
    $id = getIdActividad();
    $actividad = $dataBase->getActividad($id);

    echo $twig->render('imprimir.html', $actividad);
    
?>