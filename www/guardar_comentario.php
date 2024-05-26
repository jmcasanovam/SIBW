<?php
    include 'bd.php';
    session_start();

    if(isset($_SESSION['email']) && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['texto-comentario']) && isset($_POST['id_actividad'])){
        $dataBase = new Database();
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $texto = $_POST['texto-comentario'];
        $id_actividad = $_POST['id_actividad'];

        if($dataBase->insertarComentario($nombre, $email, $texto, $id_actividad)){
            header("Location: ./actividad.php?id=".$id_actividad);
            exit();
        }else{
            echo "Error al insertar el comentario";
        }
    } else {
        echo "Error al insertar el comentario";
    }

?>