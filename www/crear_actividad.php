<?php
include 'bd.php';
require_once "/usr/local/lib/php/vendor/autoload.php";

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['email']) && ($_SESSION['rol'] == 'superusuario' || $_SESSION['rol'] == 'gestor')) {
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $precio = $_POST['precio'];
        $contenido = $_POST['contenido'];
        $pie_imagen1 = $_POST['pie_imagen1'];
        $pie_imagen2 = $_POST['pie_imagen2'];
        $materiales = $_POST['materiales'];
        $enlaces = $_POST['enlaces'];
        $dificultad = $_POST['dificultad'];
        $duracion = $_POST['duracion'];
        $edad_minima = $_POST['edad_minima'];
        $imprimir = $_POST['imprimir'];

        $errors = [];

        // Manejo de la carga de imagen1
        if (isset($_FILES['imagen1']) && $_FILES['imagen1']['error'] == UPLOAD_ERR_OK) {
            $file_name1 = $_FILES['imagen1']['name'];
            $file_size1 = $_FILES['imagen1']['size'];
            $file_tmp1 = $_FILES['imagen1']['tmp_name'];
            $file_type1 = $_FILES['imagen1']['type'];
            $file_ext_array1 = explode('.', $_FILES['imagen1']['name']);
            $file_ext1 = strtolower(end($file_ext_array1));

            $extensions = ["jpeg", "jpg", "png"];

            if (in_array($file_ext1, $extensions) === false) {
                $errors[] = "Extensión no permitida para imagen 1, elige una imagen JPEG o PNG.";
            }

            if ($file_size1 > 2097152) {
                $errors[] = 'Tamaño del fichero de imagen 1 demasiado grande';
            }

            if (empty($errors)) {
                $imagen1_path = 'imagenesSubidas/' . uniqid() . '.' . $file_ext1;
                if (!move_uploaded_file($file_tmp1, $imagen1_path)) {
                    $errors[] = 'Error al mover el archivo de imagen 1';
                }
            }
        }

        // Manejo de la carga de imagen2
        if (isset($_FILES['imagen2']) && $_FILES['imagen2']['error'] == UPLOAD_ERR_OK) {
            $file_name2 = $_FILES['imagen2']['name'];
            $file_size2 = $_FILES['imagen2']['size'];
            $file_tmp2 = $_FILES['imagen2']['tmp_name'];
            $file_ext_array2 = explode('.', $_FILES['imagen2']['name']);
            $file_ext2 = strtolower(end($file_ext_array2));
            $extensions = ["jpeg", "jpg", "png"];

            if (in_array($file_ext2, $extensions) === false) {
                $errors[] = "Extensión no permitida para imagen 2, elige una imagen JPEG o PNG.";
            }

            if ($file_size2 > 2097152) {
                $errors[] = 'Tamaño del fichero de imagen 2 demasiado grande';
            }

            if (empty($errors)) {
                $imagen2_path = 'imagenesSubidas/' . uniqid() . '.' . $file_ext2;
                if (!move_uploaded_file($file_tmp2, $imagen2_path)) {
                    $errors[] = 'Error al mover el archivo de imagen 2';
                }
            }
        }

        if (empty($errors)) {
            $dataBase = new Database();
            $dataBase->crearActividad(array(
                'nombre' => $nombre,
                'fecha' => $fecha,
                'precio' => $precio,
                'contenido' => $contenido,
                'imagen1' => $imagen1_path ?? null,
                'pie_imagen1' => $pie_imagen1,
                'imagen2' => $imagen2_path ?? null,
                'pie_imagen2' => $pie_imagen2,
                'materiales' => [$materiales],
                'enlaces' => [$enlaces],
                'dificultad' => $dificultad,
                'duracion' => $duracion,
                'edad_minima' => $edad_minima,
                'imprimir' => $imprimir
            ));

            header("Location: ./administrar_actividades.php");
            exit();
        } else {
            echo $twig->render('crear_actividad.html', ['sesion_iniciada' => isset($_SESSION['email']), 'rol' => $_SESSION['rol'], 'errores' => $errors]);
        }
    } else {
        echo "No tienes permisos para crear actividades";
    }
} else {
    echo $twig->render('crear_actividad.html', ['sesion_iniciada' => isset($_SESSION['email']), 'rol' => $_SESSION['rol']]);
}
?>
