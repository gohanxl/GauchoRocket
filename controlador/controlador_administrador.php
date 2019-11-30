<?php
include_once("modelo/modelo_administrador.php");

function administrador_index(){
    include("vista/vista_administrador.php");
}

function administrador_ocupacion(){
    include("vista/vista_reportes_ocupacion.php");
}

function administrador_facturacion(){
    include("vista/vista_reportes_facturacion.php");
}

function administrador_cabina(){
    include("vista/vista_reportes_cabina.php");
}

?>