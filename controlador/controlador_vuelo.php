<?php
include_once("modelo/modelo_nave.php");
include_once("modelo/modelo_vuelo.php");
include_once("modelo/modelo_locacion.php");

function vuelo_index()
{
    $vuelos = getVuelos();
    $locaciones = getLocacion();
    include("vista/vista_vuelo.php");
}

function vuelo_buscar()
{
    $vuelos = getVuelos();
    $locaciones = getLocacion();
    $origen = "";
    $destino = "";
    if (isset($_GET['origen'])) {
        $origen = str_replace('+', ' ', $_GET['origen']);
    }
    if (isset($_GET['destino'])) {
        echo "entre aca";
        $destino = str_replace('+', ' ', $_GET['destino']);
    }


    if ((searchVuelos(getLocacionId($origen), getLocacionId($destino), $_GET['partida']))) {
        $vuelos = searchVuelos(getLocacionId($origen), getLocacionId($destino), $_GET['partida']);

        /*if (isset($_GET['destino'])) {
            if ((searchVuelos(getLocacionId($destino), getLocacionId($origen), $_GET['vuelta']))) {
                $vueltas = searchVuelos(getLocacionId($destino), getLocacionId($origen), $_GET['vuelta']);
            }
        }*/

    } else
        if (!isset($vuelos) && !isset($vueltas)) {
            $vuelos = getVuelos();
            $message = "No se encontraron vuelos.";
        }

    include("vista/vista_vuelo.php");
}

?>