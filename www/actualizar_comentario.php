<?php
    include 'bd.php';

    session_start();

    if(isset($_SESSION['email']) && $_SESSION['rol'] != 'registrado' && isset($_POST['id']) && isset($_POST['comentario'])){
        $dataBase = new Database();
        $id = $_POST['id'];
        $comentario = $_POST['comentario'] ;
        $comentario .= "  (Comentario editado por un moderador)";

        if($dataBase->editarComentario($id, $comentario)){
            header("Location: ./administrar_comentarios.php");
        } else {
            echo "Error al actualizar el comentario";
        }
    } else {
        echo "No tienes permisos para actualizar comentarios";
    }

?>