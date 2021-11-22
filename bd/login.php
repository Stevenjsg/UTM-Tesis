<?php
session_start();
require_once('conexion.php');

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
//$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD
$obj = new Conexion();
$conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
$query = "SELECT * FROM PERSONAS as PER, userpass as u, personas_roles as p WHERE PER.email='$usuario' AND p.cedula=PER.cedula AND PER.cedula= u.CEDULA AND u.pass = '$password'";
$consulta = pg_query($conexion, $query);


if (pg_num_rows($consulta) > 0) {
    $dat = pg_fetch_array($consulta);
    $nombres = '' . $dat['nombre'] . ' ' . $dat['apepate'];
    $ce = $dat['cedula'];
    $rol = $dat['idrol'];
    $cantidad = pg_num_rows($consulta);

    $_SESSION['s_usuario'] = $nombres;
    $_SESSION['id'] = $ce;
    $_SESSION['s_rol'] = $rol;
    print_r($dat['idrol']);
    $data = pg_fetch_all($consulta, PDO::FETCH_ASSOC);
} else {
    $_SESSION["s_usuario"] = null;
    $data = null;
}

print json_encode($data);
$conexion = null;
