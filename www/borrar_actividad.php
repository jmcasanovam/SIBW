<?php
    include 'bd.php';

    session_start();
    if(isset($_SESSION['email']) and ($_SESSION['rol'] == 'gestor' || $_SESSION['rol'] == 'superusuario') and isset($_GET['id'])){
        $dataBase = new Database();
        $id = $_GET['id'];

        if($dataBase->borrarActividad($id)){
            header("Location: ./administrar_actividades.php");
        } else {
            echo "Error al borrar el comentario";
        }
    } else {
        echo "No tienes permisos para borrar comentarios";
    }


?>