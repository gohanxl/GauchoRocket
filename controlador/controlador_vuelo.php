<?php
include_once("modelo/modelo_nave.php");
include_once("modelo/modelo_vuelo.php");
include_once("modelo/modelo_locacion.php");
include_once("modelo/modelo_cliente.php");

function vuelo_index()
{
    $tipos_vuelo = getTipoVuelo();
    $vuelos = getVuelos();
    $locaciones = getLocacion();
    include("vista/vista_vuelo.php");
}

function vuelo_buscar()
{
    $tipos_vuelo = getTipoVuelo();
    $vuelos = getVuelos();
    $locaciones = getLocacion();
    $origen = "";
    $destino = "";
    $tipo_vuelo_desc = "";
    $partida = "";
  
    if (isset($_GET['origen'])) {
        $origen = str_replace('+', ' ', $_GET['origen']);
    }
    if (isset($_GET['destino'])) {
        $destino = str_replace('+', ' ', $_GET['destino']);
    }

    if (isset($_GET['tipo_vuelo'])) {
        $tipo_vuelo_desc = str_replace('+', ' ', $_GET['tipo_vuelo']);
    }

    if ((searchVuelos(getLocacionId($origen), getLocacionId($destino), $_GET['partida'], getTipoVueloIdByDescripcion($tipo_vuelo_desc)))) {
        $vuelos = searchVuelos(getLocacionId($origen), getLocacionId($destino), $_GET['partida'], getTipoVueloIdByDescripcion($tipo_vuelo_desc));

    } else
        if (!isset($vuelos) || !isset($vueltas)) {
            $vuelos = getVuelos();
            $message = "No se encontraron vuelos.";
        }

    include("vista/vista_vuelo.php");
}

?>