<?php

class Database {
    private $mysqli;

    // Constructor que establece la conexión
    public function __construct() {
        $this->mysqli = new mysqli("database", "jose", "1234", "SIBW");
        if ($this->mysqli->connect_errno) {
            echo ("Fallo al conectar: " . $this->mysqli->connect_error);
        }
    }

    // Método para obtener un evento por su ID
    public function getEvento($idEv) {
        $query = "SELECT nombre, lugar FROM eventos WHERE id = ?";// El ? es un parámetro que se sustituirá por el valor de $idEv más adelante
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("i", $idEv);
        $statement->execute();
        $result = $statement->get_result();

        $evento = array('nombre' => 'XXX', 'lugar' => 'YYY');
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $evento = array('nombre' => $row['nombre'], 'lugar' => $row['lugar']);
        }

        return $evento;
    }

    public function createActividad($actividad){
        $nombre = $actividad['nombre'];
        $fecha = $actividad['fecha'];

        // Comprobamos si la fecha está en el formato correcto (YYYY-MM-DD)
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha)) {
            $fecha = date('Y-m-d', strtotime($fecha));
        }
        $precio = $actividad['precio'];
        $contenido = $actividad['contenido'];
        $imagen1 = $actividad['imagen1'];
        $pie_imagen1 = $actividad['pie_imagen1'];
        $imagen2 = $actividad['imagen2'];
        $pie_imagen2 = $actividad['pie_imagen2'];
        $materiales = json_encode($actividad['materiales']);
        $dificultad = $actividad['dificultad'];
        $duracion = $actividad['duracion'];
        $edad_minima = $actividad['edad_minima'];
        $enlaces = json_encode($actividad['enlaces']);
        $imprimir = $actividad['imprimir'];


        $query = "INSERT INTO actividad (nombre, fecha, precio, contenido, imagen1, pie_imagen1, imagen2, pie_imagen2, materiales, dificultad, duracion, edad_minima, enlaces, imprimir) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("sssssssssssiss", $nombre, $fecha, $precio, $contenido, $imagen1, $pie_imagen1, $imagen2, $pie_imagen2, $materiales, $dificultad, $duracion, $edad_minima, $enlaces, $imprimir);

        $statement->execute();
    }

    public function getActividad($id){
        $query = "SELECT * FROM actividad WHERE id = ?";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();

        $actividad = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $actividad = array('nombre' => $row['nombre'], 'fecha' => date('d-m-Y', strtotime($row['fecha'])), 'precio' => $row['precio'], 'contenido' => $row['contenido'], 'imagen1' => $row['imagen1'], 'pie_imagen1' => $row['pie_imagen1'], 'imagen2' => $row['imagen2'], 'pie_imagen2' => $row['pie_imagen2'], 'materiales' => json_decode($row['materiales']), 'dificultad' => $row['dificultad'], 'duracion' => $row['duracion'], 'edad_minima' => $row['edad_minima'], 'enlaces' => json_decode($row['enlaces']), 'imprimir' => $row['imprimir']);
        }else{
            $actividad = array('nombre' => 'No encontrado', 'fecha' => 'No encontrado', 'precio' => 'No encontrado', 'contenido' => 'No encontrado', 'imagen1' => 'No encontrado', 'pie_imagen1' => 'No encontrado', 'imagen2' => 'No encontrado', 'pie_imagen2' => 'No encontrado', 'materiales' => 'No encontrado', 'dificultad' => 'No encontrado', 'duracion' => 'No encontrado', 'edad_minima' => 'No encontrado', 'enlaces' => 'No encontrado', 'imprimir' => 'No encontrado');
        }

        return $actividad;
    }

    public function rellenarPalabrasProhibidas($palabras){
        $query = "INSERT INTO palabras_prohibidas (palabra) VALUES (?)";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("s", $palabra);

        foreach ($palabras as $palabra) {
            $statement->execute();
        }
    }

    public function getPalabrasProhibidas(){
        $query = "SELECT palabra FROM palabras_prohibidas";
        $result = $this->mysqli->query($query);

        $palabras = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($palabras, $row['palabra']);
            }
        }

        return $palabras;
    }

    public function getComentarios(){
        $query = "SELECT * FROM comentarios";
        $result = $this->mysqli->query($query);

        $comentarios = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($comentarios, array('nombre' => $row['nombre'], 'email' => $row['email'], 'comentario' => $row['comentario'], 'fecha' => date('d-m-Y', strtotime($row['fecha'])), 'hora' => date('H:i', strtotime($row['hora']))));
                
            }
        }

        return $comentarios;
    }

    

    // Destructor que cierra la conexión
    public function __destruct() {
        $this->mysqli->close();
    }
}

?>
