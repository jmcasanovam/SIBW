<?php
    include 'bd.php';
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    session_start();
    $dataBase = new Database();


    if (isset($_SESSION['email']) && ($_SESSION['rol'] == 'superusuario' || $_SESSION['rol'] == 'gestor') && isset($_GET['id'])){
        $id = $_GET['id'];
        $actividad = $dataBase->getActividad($id);

        $materiales = implode(", ", $actividad['materiales']);
        $actividad['materiales'] = $materiales;

        $enlaces = implode(", ", $actividad['enlaces']);
        $actividad['enlaces'] = $enlaces;
        



        

        if($actividad){
            echo $twig->render('editar_actividad.html', ['actividad' => $actividad, 'sesion_iniciada' => true, 'rol' => $_SESSION['rol']]);
        } else {
            echo "No se ha encontrado la actividad";
        }
            
    }else {
        echo "No tienes permisos para editar actividades";
    }



?>