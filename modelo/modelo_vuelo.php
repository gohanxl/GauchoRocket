<?php
include_once("helpers/conexion.php");

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
            $resultArray[] = $element;
        }
    }
    return reset($resultArray);
}

function searchVuelos($origen, $destino, $partida)
{
    $criterio = "";
    $conn = getConexion();
    $query = "SELECT * FROM vuelo";
    if (isset($origen)) {
        $criterio = $query . " WHERE  origen = $origen";
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

?>