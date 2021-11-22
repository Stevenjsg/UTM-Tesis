<?php
include_once '../bd/conexion.php';

$func = $_POST['func'];

switch ($func) {
    case 'CriterioPost':
        CriterioPost();
        break;
    case 'getFacultades':
        $tribunal = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
        getFacultades($tribunal);
        break;
    case 'getCriterio':
        $tribunal = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
        getCriterio($tribunal);
        break;
    case 'getFacultad':
        $index = (isset($_POST['index'])) ? $_POST['index'] : '';
        getFacultad($index);
        break;
    case 'updateCrit':
        $data = array(
            'id_criterio' => (isset($_POST['uidcri'])) ? $_POST['uidcri'] : '',
            'nombre' => (isset($_POST['unom_cri'])) ? $_POST['unom_cri'] : '',
            'nota' => (isset($_POST['unota_cri'])) ? $_POST['unota_cri'] : '',
            'tipo' => (isset($_POST['utipo_cri'])) ? $_POST['utipo_cri'] : '',
            'idfacultad' => (isset($_POST['ufactCri'])) ? $_POST['ufactCri'] : '',
            'ci_admin' => (isset($_POST['ucedula'])) ? $_POST['ucedula'] : ''
        );
        updateCrit($data, $data['id_criterio']);
        break;
    case 'deleteCriterio':
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        deleteCriterio($id);
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

function getFacultades($tribunal)
{
    $obj = new Conexion();
    $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
    $query = "SELECT * FROM facultades f where f.idfacultad = (SELECT pf.idfacultad FROM  personas_facultad pf WHERE pf.cedula ='$tribunal');";
    $consulta = pg_query($conexion, $query);
    $data = pg_fetch_all($consulta);
    print json_encode($data, JSON_PRETTY_PRINT);
}

function getCriterio($tribunal)
{
    $obj = new Conexion();
    $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
    $query = "SELECT * FROM Criterio cr WHERE cr.ci_admin = '$tribunal';";
    $consulta = pg_query($conexion, $query);
    $data = pg_fetch_all($consulta);
    print json_encode($data, JSON_PRETTY_PRINT);
}
function getFacultad($index)
{
    $obj = new Conexion();
    $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
    $query = "SELECT * FROM facultades f where f.idfacultad = $index;";
    $consulta = pg_query($conexion, $query);
    $data = pg_fetch_all($consulta);
    print json_encode($data, JSON_PRETTY_PRINT);
}
function updateCrit($data, $id)
{
    $obj = new Conexion();
    $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
    $consulta = pg_update($conexion, 'criterio', $data, array('id_criterio' => $id));
    $data = pg_fetch_all($consulta);
    print json_encode($data, JSON_PRETTY_PRINT);
}
function deleteCriterio($id)
{
    $obj = new Conexion();
    $conexion = $obj->Conectar($obj->getServidor(), $obj->getDbname(), $obj->getUser(), $obj->getPass());
    $consulta = pg_delete($conexion, 'criterio', array('id_criterio' => $id));
    print json_encode($consulta, JSON_PRETTY_PRINT);
}