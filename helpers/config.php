<?php
    function getConfigAsArray(){
        return parse_ini_file('config/config.ini', true);
    }

    function getTrayectosAsArray(){
        return parse_ini_file('config/trayectos.ini', true);
    }