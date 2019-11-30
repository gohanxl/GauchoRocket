<?php
include_once("modelo/modelo_administrador.php");

$admin = $_SESSION['admin'];

function administrador_index(){
    if(isset($admin) and $admin){
        include("vista/vista_administrador.php");
    }
    else{
        include("vista/vista_404.php");
    }
}

function administrador_ocupacion(){
    if(isset($admin) and $admin){
        include("vista/vista_reportes_ocupacion.php");
    }
    else{
        include("vista/vista_404.php");
    }
}

function administrador_facturacion(){
    if(isset($admin) and $admin){
        include("vista/vista_reportes_facturacion.php");
    }
    else{
        include("vista/vista_404.php");
    }
}

function administrador_cabina(){
    if(isset($admin) and $admin){
        include("vista/vista_reportes_cabina.php");
    }
    else{
        include("vista/vista_404.php");
    }
}

?>