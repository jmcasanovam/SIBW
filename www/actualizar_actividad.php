<?php
include 'bd.php';
require_once "/usr/local/lib/php/vendor/autoload.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['email']) && ($_SESSION['rol'] == 'superusuario' || $_SESSION['rol'] == 'gestor') && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['contenido'])){
        $dataBase = new Database();
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $contenido = $_POST['contenido'];
        $fecha = $_POST['fecha'];
        $precio = $_POST['precio'];
        $pie_imagen1 = $_POST['pie_imagen1'];
        $pie_imagen2 = $_POST['pie_imagen2'];
        $duracion = $_POST['duracion'];
        $edad_minima = $_POST['edad_minima'];
        $imprimir = $_POST['imprimir'];
        $dificultad = $_POST['dificultad'];
        $estado = $_POST['publicada'];

        // Manejo de la subida de imágenes
        $imagen1 = $_POST['imagen1'];
        if (isset($_FILES['imagen1_nueva']) && $_FILES['imagen1_nueva']['error'] === UPLOAD_ERR_OK) {
            $imagen1_nueva_name = $_FILES['imagen1_nueva']['name'];
            $imagen1_nueva_tmp = $_FILES['imagen1_nueva']['tmp_name'];
            if (move_uploaded_file($imagen1_nueva_tmp, "imagenesSubidas/" . $imagen1_nueva_name)) {
                $imagen1 = "imagenesSubidas/" . $imagen1_nueva_name;
            } else {
                echo "Error al subir la nueva imagen 1";
                exit();
            }
        }

        $imagen2 = $_POST['imagen2'];
        if (isset($_FILES['imagen2_nueva']) && $_FILES['imagen2_nueva']['error'] === UPLOAD_ERR_OK) {
            $imagen2_nueva_name = $_FILES['imagen2_nueva']['name'];
            $imagen2_nueva_tmp = $_FILES['imagen2_nueva']['tmp_name'];
            if (move_uploaded_file($imagen2_nueva_tmp, "imagenesSubidas/" . $imagen2_nueva_name)) {
                $imagen2 = "imagenesSubidas/" . $imagen2_nueva_name;
            } else {
                echo "Error al subir la nueva imagen 2";
                exit();
            }
        }

        // // Crear instancia de la base de datos
        

        $actividad = array(
            'id' => $id,
            'nombre' => $nombre,
            'contenido' => $contenido,
            'precio' => $precio,
            'pie_imagen1' => $pie_imagen1,
            'pie_imagen2' => $pie_imagen2,
            'duracion' => $duracion,
            'edad_minima' => $edad_minima,
            'imprimir' => $imprimir,
            'dificultad' => $dificultad,
            'imagen1' => $imagen1,
            'imagen2' => $imagen2,
            'estado' => $estado,
        ); 

        if($dataBase->actualizarActividad($actividad)){
            // echo "Actividad actualizada correctamente";
            header("Location: administrar_actividades.php");
        } else {
            echo "Error al actualizar la actividad";
        }

        
    } else {
        echo "No tienes permisos para actualizar actividades";
    }
} else {
    echo "Método de solicitud no permitido";
}
?>
