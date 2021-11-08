<?php
include_once '../bd/conexion.php';

if ($_POST) {
    $nombre = $_POST['nomCri'];
    $tipo = $_POST['tipoCri'];
    $nota = $_POST['notaCri'];
    echo setCriterios($nombre, $tipo, $nota);
}

function setCriterios($nombre, $tipo, $nota)
{
    /*$objeto = new Conexion();
    $conexion = $objeto->Conectar();
    $consulta = "INSERT INTO criterio VALUES (1,$nombre,$tipo,$nota)";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();*/
    echo  "{$nombre}  {$tipo}  {$nota}";
}
