<?php
    include 'bd.php';

    session_start();

    if(isset($_SESSION['email']) && $_SESSION['rol'] == 'superusuario' && isset($_POST['email']) && isset($_POST['rol'])){
        $dataBase = new Database();
        $id = $_POST['email'];
        $rol = $_POST['rol'];

        if($dataBase->actualizarRol($id, $rol)){
            header("Location: ./administrar_usuarios.php");
        } else {
            echo "Error al actualizar el rol";
        }
    } else {
        echo "No tienes permisos para actualizar roles";
    }

?>