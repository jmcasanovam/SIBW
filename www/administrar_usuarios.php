<?php
    include 'bd.php';
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    session_start();

    if(isset($_SESSION['email']) && $_SESSION['rol'] == 'superusuario'){
        $sesion_iniciada = true;
        $dataBase = new Database();
        $usuarios = $dataBase->getUsuarios();
        echo $twig->render('administrar_usuarios.html', ["usuarios" => $usuarios, 'sesion_iniciada' => $sesion_iniciada, 'rol' => $_SESSION['rol']]);
    } else {
        header('Location: index.php');
    }
       
        


?>