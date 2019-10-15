<?php
include_once("helpers/conexion.php");

function getLocacion(){
    $conn = getConexion();
    $query = "SELECT * FROM locacion ORDER BY descripcion;";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['descripcion'] = $row['descripcion'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}


function getLocacionId($descripcion)
{
    $conn = getConexion();
    $query = "SELECT * FROM locacion WHERE descripcion LIKE '$descripcion';";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['id'];
}

function getLocacionDescripcion($id)
{
    $conn = getConexion();
    $query = "SELECT * FROM locacion WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['descripcion'];
}

?>