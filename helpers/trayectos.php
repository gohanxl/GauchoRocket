<?php
    include_once("config.php");

    function getTrayectos(){
        $trayectos = getTrayectosAsArray();

        $trayecto1 =  $trayectos['circuito1']['trayecto1'];

        return $trayecto1;
    }