<?php
include_once '../bd/conexion.php';
session_start();


$facultad = (isset($_POST['factCri'])) ? $_POST['factCri'] : '';
$nombre = (isset($_POST['txt_nom_cri'])) ? $_POST['txt_nom_cri'] : '';
$tipo = (isset($_POST['txt_tipo_cri'])) ? $_POST['txt_tipo_cri'] : '';
$nota = (isset($_POST['txt_nota_cri'])) ? $_POST['txt_nota_cri'] : '';

echo setCriterios($facultad, $nombre, $tipo, $nota);


function setCriterios($facultad, $nombre, $tipo, $nota)
{
    $obj = new Conexion();
    $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
    $index = getIndexCiterio() + 1;
    $query = array(
        'id_criterio' => $index,
        'nombre' => $nombre,
        'tipo' => $tipo,
        'nota' => $nota,
        'idfacultad' => $facultad
    );
    print_r($query);
    try {
        $res = pg_insert($conexion, 'criterio', $query);

        if ($res) {
            echo 'bien';
        } else {
            echo 'mal';
        }
    } catch (Exception $e) {
        printf($e->getMessage());
    }
}
function getIndexCiterio()
{
    $obj = new Conexion();
    $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
    try {
        $res = pg_query($conexion, 'SELECT * FROM CRITERIO');
        $dat = pg_num_rows($res);
        printf('AQUI -------------------' . $dat . ' ');
        return $dat;
    } catch (Exception $e) {
        printf($e->getMessage());
    }
}
