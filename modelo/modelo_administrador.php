<?php

include_once("helpers/conexion.php");


function getAdminEstado($id){

    $conn = getConexion();
    $query = "SELECT * FROM usuario WHERE id = $id AND administrador = 1;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['administrador'];
}

function getReporteTasaDeOcupacion(){

    $conn = getConexion();
    $query = "SELECT P.vuelo, P.cabina, COUNT(DISTINCT P.id) as pasajes, MC.capacidad, (COUNT(DISTINCT P.id)*100/MC.capacidad) as porcentaje
FROM pasaje P JOIN cabina C 
	ON P.cabina = C.id JOIN
    modelo_cabina MC ON MC.cabina = C.id
GROUP BY P.vuelo, P.cabina;";

    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['vuelo'] = $row['vuelo'];
            $element['cabina'] = $row['cabina'];
            $element['pasajes'] = $row['pasajes'];
            $element['capacidad'] = $row['capacidad'];
            $element['porcentaje'] = $row['porcentaje'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}
