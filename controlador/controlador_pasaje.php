<?php
include_once("modelo/modelo_cliente.php");
include_once("modelo/modelo_vuelo.php");
include_once("modelo/modelo_pasaje.php");
include_once("modelo/modelo_locacion.php");
include_once("modelo/modelo_nave.php");
include_once ("modelo/modelo_pasaje.php");
include_once ("modelo/modelo_registro.php");

function pasaje_reserva()
{
    include("vista/vista_compra.php");
}

function pasaje_alta(){

    include("vista/vista_confirmar_compra.php");
}

function pasaje_lista(){
    $pasajes = getPasajesByCliente(getClienteId($_SESSION['user']));
    include("vista/vista_pasajes.php");
}

function pasaje_compra(){
    include("vista/vista_confirmar_compra.php");
}

function pasaje_espera(){
    include("vista/vista_espera.php");
}

function pasaje_confirmado(){
    include("vista/vista_exito_compra.php");
}

function pasaje_exito(){
    include("vista/vista_exito.php");
}

function pasaje_checkin(){
    include("vista/vista_checkin.php");
}