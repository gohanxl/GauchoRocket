<?php
include_once("helpers/conexion.php");
include_once("helpers/trayectos.php");

function getVuelos()
{
    $conn = getConexion();
    $query = "SELECT * FROM vuelo ORDER BY partida;";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['origen'] = $row['origen'];
            $element['destino'] = $row['destino'];
            $element['duracion'] = $row['duracion'];
            $element['nave'] = $row['nave'];
            $element['partida'] = $row['partida'];
            $element['hora'] = $row['hora'];
            $element['tipo_vuelo'] = $row['tipo_vuelo'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function getTipoVuelo()
{
    $conn = getConexion();
    $query = "SELECT * FROM tipo_vuelo ORDER BY descripcion;";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_fetch_assoc($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['descripcion'] = $row['descripcion'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function searchVueloId($id){
    $conn = getConexion();
    $query = "SELECT * FROM vuelo WHERE id = $id";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['origen'] = $row['origen'];
            $element['destino'] = $row['destino'];
            $element['duracion'] = $row['duracion'];
            $element['nave'] = $row['nave'];
            $element['partida'] = $row['partida'];
            $element['hora'] = $row['hora'];
            $element['tipo_vuelo'] = $row['tipo_vuelo'];
            $resultArray[] = $element;
        }
    }
    return reset($resultArray);
}

function searchVuelos($origen, $destino, $partida, $tipo_vuelo)
{
    $criterio = "";
    $conn = getConexion();
    $query = "SELECT * FROM vuelo";
    if (isset($origen)) {
        $criterio = $query . " WHERE  origen = $origen";
    }

    if (isset($tipo_vuelo)) {
        if (empty($criterio)) {
            $criterio = $query . " WHERE tipo_vuelo = $tipo_vuelo";
        } else if (!empty($partida)) {
            $criterio = $criterio . " AND tipo_vuelo = $tipo_vuelo";
        }
    }
    if (isset($destino)) {
        if (empty($criterio)) {
            $criterio = $query . " WHERE destino = $destino";
        } else if(!empty($destino)){
            $criterio = $criterio . " AND destino = $destino";
        }
    }
    if (isset($partida)) {
        if (empty($criterio)) {
            $criterio = $query . " WHERE partida = $partida";
        } else if(!empty($partida)) {
            $criterio = $criterio . " AND partida = $partida";
        }
    }

    $result = execute_query($conn, $criterio);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['origen'] = $row['origen'];
            $element['destino'] = $row['destino'];
            $element['duracion'] = $row['duracion'];
            $element['nave'] = $row['nave'];
            $element['partida'] = $row['partida'];
            $element['hora'] = $row['hora'];
            $element['tipo_vuelo'] = $row['tipo_vuelo'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function addVuelo($numero, $nombre, $tipo, $imagen)
{
    $conn = getConexion();
    $query = "";
    execute_query($conn, $query);
}


function getDescriptionTipoVuelo($id){
    $conn = getConexion();
    $query = "SELECT * FROM tipo_vuelo WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['descripcion'];
}

function getTipoVueloIdByDescripcion($descripcion)
{
    $conn = getConexion();
    $query = "SELECT * FROM tipo_vuelo WHERE descripcion LIKE '$descripcion';";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['id'];
}

function getDescriptionTipoVueloModelo($id){
    $conn = getConexion();
    $query = "SELECT * FROM tipo_vuelo WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['descripcion'];
}

function getIdTipoVuelo($id){
    $conn = getConexion();
    $query = "SELECT * FROM vuelo WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['tipo_vuelo'];
}

function getDestinoByVueloId($id){
$conn = getConexion();
    $query = "SELECT * FROM vuelo WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['destino'];
}

function getOrigenByVueloId($id){
    $conn = getConexion();
    $query = "SELECT * FROM vuelo WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['origen'];
}

function getTrayecto($vuelo_id){
    $conn = getConexion();
    $query = "SELECT * FROM trayecto WHERE vuelo_id = $vuelo_id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['id'];
}

function getCircuito($vuelo_id){
    $conn = getConexion();
    $query = "SELECT * FROM trayecto WHERE vuelo_id = $vuelo_id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['circuito'];
}

function getDescripcionCircuitoById($id){
    $conn = getConexion();
    $query = "SELECT * FROM circuito WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['descripcion'];
}

function getTrayectosByDescripcion($trayecto){
    return getTrayectos($trayecto);
}

?>

