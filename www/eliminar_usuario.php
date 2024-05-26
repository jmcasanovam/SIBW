<?php
include 'bd.php';

session_start();

if (isset($_SESSION['email']) && $_SESSION['rol'] == 'superusuario' && isset($_GET['id'])) {
    $dataBase = new Database();
    $id = $_GET['id'];

    if ($dataBase->borrarUsuario($id)) {
        header("Location: ./administrar_usuarios.php");
        exit();
    } else {
        echo "Error al eliminar el usuario";
    }
} else {
    echo "No tienes permisos para eliminar usuarios";
}
?>
