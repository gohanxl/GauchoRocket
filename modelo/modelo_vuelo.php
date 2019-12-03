<?php
include_once("helpers/conexion.php");
include_once("helpers/trayectos.php");

function getVuelos()
{
    $conn = getConexion();
    $query = "SELECT * FROM vuelo WHERE partida >= CURDATE() AND CONCAT(partida, ' ', hora) > DATE_SUB(NOW(), INTERVAL 2 HOUR) ORDER BY partida;";
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
            $element['circuito'] = $row['circuito'];
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
    if (mysqli_num_rows($result) > 0){
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
    $query = "SELECT * FROM vuelo WHERE id = $id;";
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
            $element['circuito'] = $row['circuito'];
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
    if ($destino != '') {
        if (empty($criterio)) {
            $criterio = $query . " WHERE destino = $destino";
        } else if(!empty($destino)){
            $criterio = $criterio . " AND destino = $destino";
        }
    }
    if ($partida != '') {
        if (empty($criterio)) {
            $criterio = $query . " WHERE partida = '$partida'";
        } else if(!empty($partida)) {
            $criterio = $criterio . " AND partida = '$partida'";
        }
    }

    if(empty($criterio)){
        $criterio = $query . " WHERE partida >= CURDATE() AND CONCAT(partida, ' ', hora) > DATE_SUB(NOW(), INTERVAL 2 HOUR)";

    }
    else{
        $criterio = $criterio . " AND partida >= CURDATE() AND CONCAT(partida, ' ', hora) > DATE_SUB(NOW(), INTERVAL 2 HOUR)";
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
            $element['circuito'] = $row['circuito'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function addVuelo($origen, $destino, $duracion, $nave, $partida, $hora, $tipo_vuelo, $circuito)
{
    $conn = getConexion();
    $query = "INSERT INTO vuelo (origen, destino, duracion, nave, partida, hora, tipo_vuelo, circuito)
    VALUES ($origen, $destino, $duracion, $nave, '$partida', '$hora', $tipo_vuelo, $circuito);";
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

function getHoraByVueloId($id){
    $conn = getConexion();
    $query = "SELECT * FROM vuelo WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['hora'];
}

function getDescripcionCircuitoById($id){
    $conn = getConexion();
    $query = "SELECT * FROM circuito WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['descripcion'];
}

function getPartidaByVueloId($id){
    $conn = getConexion();
    $query = "SELECT * FROM vuelo WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['partida'];
}

function getCircuitos(){

    $conn = getConexion();
    $query = "SELECT * FROM circuito";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['descripcion'] = $row['descripcion'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;

}
?>

