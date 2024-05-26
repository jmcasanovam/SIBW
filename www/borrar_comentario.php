<?php
    include 'bd.php';

    session_start();
    if(isset($_SESSION['email']) and $_SESSION['rol'] != 'registrado' and isset($_GET['id'])){
        $dataBase = new Database();
        $id = $_GET['id'];

        if($dataBase->borrarComentario($id)){
            header("Location: ./administrar_comentarios.php");
        } else {
            echo "Error al borrar el comentario";
        }
    } else {
        echo "No tienes permisos para borrar comentarios";
    }


?>