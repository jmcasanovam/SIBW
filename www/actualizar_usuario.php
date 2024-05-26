<?php
    include "bd.php";

    session_start();

    if(isset($_SESSION['email']) && $_SESSION['rol'] == 'superusuario' && isset($_POST['email1']) && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['contrasena'])) {
        $old_user_email = $_POST['email1'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];

        $bd = new Database();
        if($bd->updateUser($old_user_email, $nombre, $email, $contrasena)) {
            header("Location: administrar_usuarios.php");
            exit();
        } else {
            echo "Error al actualizar los datos.";
        }
    } else {
        echo "Usuario no autenticado.";
    }
?>