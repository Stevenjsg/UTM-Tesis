<?php
include_once '../bd/conexion.php';

$func = $_POST['func'];

switch ($func) {
    case 'CriterioPost':
        CriterioPost();
        break;
    case 'getFacultades':
        getFacultades();
        break;
    case 'getCriterio':
        getCriterio();
        break;
}

function CriterioPost()
{
    $facultad = (isset($_POST['factCri'])) ? $_POST['factCri'] : '';
    $nombre = (isset($_POST['txt_nom_cri'])) ? $_POST['txt_nom_cri'] : '';
    $tipo = (isset($_POST['txt_tipo_cri'])) ? $_POST['txt_tipo_cri'] : '';
    $nota = (isset($_POST['txt_nota_cri'])) ? $_POST['txt_nota_cri'] : '';
    $tribunal = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';

    echo setCriterios($facultad, $nombre, $tipo, $nota, $tribunal);
}

function setCriterios($facultad, $nombre, $tipo, $nota, $tribunal)
{
    $obj = new Conexion();
    $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
    $index = getIndexCiterio() + 1;
    try {
        $query = array(
            'id_criterio' => $index,
            'nombre' => $nombre,
            'nota' => $nota,
            'tipo' => $tipo,
            'idfacultad' => $facultad,
            'ci_admin' => $tribunal
        );
        $res = pg_insert($conexion, 'criterio', $query);

        if ($res) {
            $res = array(
                'success' => 'bien'
            );
            echo json_encode($res, JSON_PRETTY_PRINT);
        } else {
            $res = array('error' => 'Ocurrio un error');
            echo json_encode($res, JSON_PRETTY_PRINT);
        }
    } catch (Exception $e) {
        printf('EXCEPTION: ' . $e->getMessage());
    }
}
function getIndexCiterio()
{
    $obj = new Conexion();
    $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
    try {
        $res = pg_query($conexion, 'SELECT * FROM CRITERIO');
        $dat = pg_num_rows($res);
        return $dat;
    } catch (Exception $e) {
        printf($e->getMessage());
    }
}

function getFacultades()
{
    $obj = new Conexion();
    $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
    $query = "SELECT * FROM facultades;";
    $consulta = pg_query($conexion, $query);
    $data = pg_fetch_all($consulta);
    print json_encode($data);
}

function getCriterio()
{
    $obj = new Conexion();
    $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
    $query = "SELECT * FROM Criterio;";
    $consulta = pg_query($conexion, $query);
    $data = pg_fetch_all($consulta);
    print json_encode($data);
}
