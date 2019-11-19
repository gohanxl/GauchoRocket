<?php
    include_once("config.php");

    function getTrayectos($trayecto){
        $trayectos = getTrayectosAsArray();

        $resultado =  $trayectos[$trayecto];

        return $resultado;
    }