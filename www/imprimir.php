<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "./cargar_informacion.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $argumentos = gestionarParametros();

    echo $twig->render('imprimir.html', $argumentos);
    
?>