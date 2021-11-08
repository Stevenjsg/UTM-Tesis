<?php
include_once 'conexion.php';
$obj = new Conexion();
$conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
session_start();

//recepción de datos enviados mediante POST desde ajax

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
//$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD
$query = "SELECT * FROM tribunal as t, userpass as u WHERE t.email='$usuario' AND t.cedula= u.tribunal AND u.pass = '$password';";
$consulta = pg_query($conexion, $query);
$dat = pg_fetch_array($consulta);
$nombres = '' . $dat['nombre'] . ' ' . $dat['apellidos'];
$ce = ' ' . $dat['cedula'];
$cantidad = pg_num_rows($consulta);

if ($cantidad > 0) {
    $_SESSION['s_usuario'] = $nombres;
    $_SESSION['id'] = ' ' . $ce;
    $data = pg_fetch_all($consulta, PDO::FETCH_ASSOC);
} else {
    $_SESSION["s_usuario"] = null;
    $data = null;
}


print json_encode($data);
$conexion = null;
