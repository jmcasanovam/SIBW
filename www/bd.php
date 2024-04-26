<?php
  function getEvento($idEv) {
  
    $mysqli = new mysqli("database", "jose", "1234", "SIBW");
    if ($mysqli->connect_errno) {
      echo ("Fallo al conectar: " . $mysqli->connect_error);
    }

    $res = $mysqli->query("SELECT nombre, lugar FROM eventos WHERE id=" . $idEv);
    
    $evento = array('nombre' => 'XXX', 'lugar' => 'YYY');
    
    if ($res->num_rows > 0) {
      $row = $res->fetch_assoc();
      
      $evento = array('nombre' => $row['nombre'], 'lugar' => $row['lugar']);
    }
    
    return $evento;
  }
?>