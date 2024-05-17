<?php

include 'bd.php';

$bd = new Database();
// $bd->crearTablaUsuarios();
// $usuario1 = array('nombre' => 'Jose', 'email' => 'jose@example.com', 'password' => password_hash('1234', PASSWORD_DEFAULT), 'rol' => 'superusuario');
$usuario1 = array('nombre' => 'Jose2', 'email' => 'jose2@example.com', 'password' => '1234', 'rol' => 'superusuario');
// $bd->crearUsuario($usuario1);
$arrayUsers = $bd->getUsuarios();
foreach ($arrayUsers as $user) {
    echo $user['email'] . "<br>";
}

echo "Usuarios creados correctamente";

?>