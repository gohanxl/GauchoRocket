<?php
    include_once("modelo/modelo_nave.php");
    include_once("modelo/modelo_vuelo.php");
    include_once("modelo/modelo_locacion.php");

    function vuelo_index(){
        $vuelos = getVuelos();
        $locaciones = getLocacion();
        include("vista/vista_vuelo.php");
    }

    function vuelo_buscar(){
        if ( !empty(searchVuelos($_GET['origen'], $_GET['destino'],$_GET['partida']))) {
            $vuelos = searchVuelos($_GET['origen'], $_GET['destino'],$_GET['partida']);
        }
        else {
            $vuelos = getVuelos();
            $message = "No se encontraron vuelos.";
        }

        include("vista/vista_vuelo.php");
    }
?>