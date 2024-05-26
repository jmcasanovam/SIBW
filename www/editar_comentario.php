<?php
    include 'bd.php';
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    session_start();
    
    if(isset($_SESSION['email']) and $_SESSION['rol'] != 'registrado' and isset($_GET['id'])){
        $dataBase = new Database();
        $id = $_GET['id'];
        $comentario = $dataBase->getComentario($id);

        if($comentario){
            echo $twig->render('editar_comentario.html', ['comentario' => $comentario, 'sesion_iniciada' => true, 'rol' => $_SESSION['rol']]);
        } else {
            echo "No se ha encontrado el comentario";
        }        
    } else {
        echo "No tienes permisos para editar comentarios";
    }
?>