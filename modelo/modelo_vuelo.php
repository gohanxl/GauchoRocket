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
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function searchVuelos($origen, $destino, $partida)
{
    $conn = getConexion();
    $query = "SELECT * FROM vuelo WHERE origen = $origen AND destino = $destino AND partida = '$partida';";
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