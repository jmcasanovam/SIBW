<?php
    include 'bd.php';
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    session_start();
    if(isset($_SESSION['email']) && ($_SESSION['rol'] == 'superusuario' || $_SESSION['rol'] == 'gestor')){
        $sesion_iniciada = true;
        
        $dataBase = new Database();
        $actividades = $dataBase->getActividades($_SESSION['rol']);
        echo $twig->render('administrar_actividades.html', ["actividades" => $actividades, 'sesion_iniciada' => $sesion_iniciada, 'rol' => $_SESSION['rol']]);
    }
?>