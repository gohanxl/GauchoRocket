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

?>