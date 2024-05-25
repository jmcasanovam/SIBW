<?php
include "bd.php";

session_start();

if(isset($_SESSION['email'])) {
    $old_user_email = $_SESSION['email'];

    if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['contrasena'])) {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];

        $bd = new Database();
        if($bd->updateUser($old_user_email, $nombre, $email, $contrasena)) {
            // Actualizar la sesión si el email ha cambiado
            if ($old_user_email != $email) {
                $_SESSION['email'] = $email;
                $_SESSION['nombre'] = $nombre;
            }
            header("Location: perfil.php");
            exit();
        } else {
            echo "Error al actualizar los datos.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Usuario no autenticado.";
}
?>
