<?php
include 'bd.php';
require_once "/usr/local/lib/php/vendor/autoload.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['email']) && ($_SESSION['rol'] == 'superusuario' || $_SESSION['rol'] == 'gestor')) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $contenido = $_POST['contenido'];
        $fecha = $_POST['fecha'];
        $precio = $_POST['precio'];
        $pie_imagen1 = $_POST['pie_imagen1'];
        $pie_imagen2 = $_POST['pie_imagen2'];
        $materiales = $_POST['materiales'];
        $duracion = $_POST['duracion'];
        $edad_minima = $_POST['edad_minima'];
        $enlaces = $_POST['enlaces'];
        $imprimir = $_POST['imprimir'];
        $dificultad = $_POST['dificultad'];

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

        // Crear instancia de la base de datos
        $dataBase = new Database();
        $actividad = array(
            'id' => $id,
            'nombre' => $nombre,
            'contenido' => $contenido,
            'fecha' => $fecha,
            'precio' => $precio,
            'imagen1' => $imagen1,
            'pie_imagen1' => $pie_imagen1,
            'imagen2' => $imagen2,
            'pie_imagen2' => $pie_imagen2,
            'materiales' => $materiales,
            'duracion' => $duracion,
            'edad_minima' => $edad_minima,
            'enlaces' => $enlaces,
            'imprimir' => $imprimir,
            'dificultad' => $dificultad
        );

        if ($dataBase->actualizarActividad($actividad)) {
            header("Location: ./administrar_actividades.php");
            exit();
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
