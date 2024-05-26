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
                array_push($comentarios, array('nombre' => $row['nombre'], 'email' => $row['email'], 'comentario' => $row['comentario'], 'fecha' => date('d-m-Y', strtotime($row['fecha'])), 'hora' => date('H:i', strtotime($row['hora'])), 'id' => $row['id']));
                
            }
        }

        return $comentarios;
    }

    public function getActividades(){
        $query = "SELECT * FROM actividad";
        $result = $this->mysqli->query($query);

        $actividades = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($actividades, array('id' => $row['id'], 'nombre' => $row['nombre'], 'imagen1' => $row['imagen1']));
            }
        }

        return $actividades;
    }

    public function crearTablaUsuarios(){
        $querry = "CREATE TABLE usuarios (email VARCHAR(255) PRIMARY KEY, password VARCHAR(255), nombre VARCHAR(255) NOT NULL, rol ENUM('registrado', 'moderador', 'gestor', 'superusuario') NOT NULL DEFAULT 'registrado', fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
        $this->mysqli->query($querry);

        
    }

    public function crearUsuario($usuario){
        $email = $usuario['email'];
        $password = password_hash($usuario['password'], PASSWORD_DEFAULT);
        $nombre = $usuario['nombre'];
        $rol = isset($usuario['rol']) ? $usuario['rol'] : 'registrado';

        $query = "INSERT INTO usuarios (email, password, nombre, rol) VALUES (?,?,?,?)";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("ssss", $email, $password, $nombre, $rol);

        $statement->execute();
        if ($statement->affected_rows > 0) {// Si se ha insertado algún registro
            return true;
        } else {
            return false;
        }
    }

    public function getUsuarios(){
        $query = "SELECT * FROM usuarios";
        $result = $this->mysqli->query($query);

        $usuarios = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($usuarios, array('email' => $row['email'], 'nombre' => $row['nombre'], 'rol' => $row['rol'], 'fecha_registro' => date('d-m-Y H:i', strtotime($row['fecha_registro']))));
            }
        }

        return $usuarios;
    }

    public function checkLogin($email, $password){
        $query = "SELECT password FROM usuarios WHERE email = ?";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return password_verify($password, $row['password']);
        }

        return false;
    }

    function getUser($email){
        $query = "SELECT * FROM usuarios WHERE email = ?";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();

        $usuario = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $usuario = array('email' => $row['email'], 'nombre' => $row['nombre'], 'rol' => $row['rol'], 'fecha_registro' => date('d-m-Y H:i', strtotime($row['fecha_registro'])));

            return $usuario;
        }

        return 0;
    }

    function updateUser($old_user_email, $nombre, $email, $contrasena){
        $query = "UPDATE usuarios SET nombre = ?, email = ?, password = ? WHERE email = ?";
        $hash_password = password_hash($contrasena, PASSWORD_DEFAULT);
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("ssss", $nombre, $email, $hash_password, $old_user_email);

        $statement->execute();
        if ($statement->affected_rows > 0) {// Si se ha actualizado algún registro
            return true;
        } else {
            return false;
        }
        
    }

    function borrarComentario($id){
        $query = "DELETE FROM comentarios WHERE id = ?";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("i", $id);

        $statement->execute();
        if ($statement->affected_rows > 0) {// Si se ha borrado algún registro
            return true;
        } else {
            return false;
        }
    }

    function getComentario($id){
        $query = "SELECT * FROM comentarios WHERE id = ?";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();

        $comentario = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $comentario = array('nombre' => $row['nombre'], 'email' => $row['email'], 'comentario' => $row['comentario'], 'fecha' => date('d-m-Y', strtotime($row['fecha'])), 'hora' => date('H:i', strtotime($row['hora'])), 'id' => $row['id']);
        }

        return $comentario;
    }

    function editarComentario($id, $comentario){
        $query = "UPDATE comentarios SET comentario = ? WHERE id = ?";
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param("si", $comentario, $id);

        $statement->execute();
        if ($statement->affected_rows > 0) {// Si se ha actualizado algún registro
            return true;
        } else {
            return false;
        }
    }

    

    // Destructor que cierra la conexión
    public function __destruct() {
        $this->mysqli->close();
    }
}

?>
