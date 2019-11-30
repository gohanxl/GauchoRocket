<?php
include_once("modelo/modelo_administrador.php");

function administrador_index(){
    if($_SESSION['admin']){
        include("vista/vista_administrador.php");
    }
    else{
        include("vista/vista_404.php");
    }
}

function administrador_ocupacion(){
    if($_SESSION['admin']){
        include("vista/vista_reportes_ocupacion.php");
    }
    else{
        include("vista/vista_404.php");
    }
}

function administrador_facturacion(){
    if($_SESSION['admin']){
        include("vista/vista_reportes_facturacion.php");
    }
    else{
        include("vista/vista_404.php");
    }
}

function administrador_cabina(){
    if($_SESSION['admin']){
        include("vista/vista_reportes_cabina.php");
    }
    else{
        include("vista/vista_404.php");
    }
}

?>