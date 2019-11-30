<?php
include_once("helpers/conexion.php");

function getNaveId($matricula)
{
    $conn = getConexion();
    $query = "SELECT * FROM nave WHERE matricula LIKE '$matricula';";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['id'];
}

function getNaveDescripcion($id)
{
    $conn = getConexion();
    $query = "SELECT * FROM nave WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['matricula'];
}


function getNaveModelo($id)
{

    $conn = getConexion();
    $query = "SELECT * FROM nave WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['modelo'];
}

function getServicios(){
    $conn = getConexion();
    $query = "SELECT * FROM servicio;";
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

function getCabinaModelo($modelo_id)
{
    $conn = getConexion();
    $query = "SELECT * FROM modelo_cabina WHERE modelo = $modelo_id;";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['modelo'] = $row['modelo'];
            $element['cabina'] = $row['cabina'];
            $element['capacidad'] = $row['capacidad'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function getCabinaModeloByCabina($cabina_id)
{
    $conn = getConexion();
    $query = "SELECT * FROM modelo_cabina WHERE modelo = $cabina_id;";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['modelo'] = $row['modelo'];
            $element['cabina'] = $row['cabina'];
            $element['capacidad'] = $row['capacidad'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function getCabinaDescripcion($id)
{

    $conn = getConexion();
    $query = "SELECT * FROM cabina WHERE id = $id;";
    $result = execute_query($conn, $query);

    return mysqli_fetch_assoc($result)['descripcion'];
}

function getCabinaCapacidad($modelo, $cabina)
{

    $conn = getConexion();
    $query = "SELECT capacidad FROM modelo_cabina WHERE modelo = $modelo AND cabina = $cabina;";
    $result = execute_query($conn, $query);

    return mysqli_fetch_assoc($result)['capacidad'];
}