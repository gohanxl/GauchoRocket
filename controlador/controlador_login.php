<?php
    include_once("modelo/modelo_login.php");
    include_once ("modelo/modelo_cliente.php");
    include_once ("modelo/modelo_administrador.php");
    
    function login_index(){
        include("vista/vista_login.php");
    }
?>