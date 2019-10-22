<?php
include_once("modelo/modelo_cliente.php");
include_once("modelo/modelo_centro.php");
include_once("modelo/modelo_turno.php");

function turno_alta(){
    $centros = getCentros();
    include("vista/vista_turno.php");
}