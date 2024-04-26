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
        $query = "SELECT nombre, lugar FROM eventos WHERE id = ?";
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

    

    // Destructor que cierra la conexión
    public function __destruct() {
        $this->mysqli->close();
    }
}

?>
