<?php
include_once("helpers/conexion.php");

function getCentros(){
    $conn = getConexion();
    $query = "SELECT * FROM centro_medico ORDER BY nombre;";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['nombre'] = $row['nombre'];
            $element['turnos'] = $row['turnos'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function getCentroTurnos($id){
    $conn = getConexion();
    $query = "SELECT * FROM centro_medico WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['turnos'];
}

function getCentroId($nombre)
{
    $conn = getConexion();
    $query = "SELECT * FROM centro_medico WHERE nombre LIKE '$nombre';";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['id'];
}

function getCentroDescripcion($id)
{
    $conn = getConexion();
    $query = "SELECT * FROM centro_medico WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['nombre'];
}

?>