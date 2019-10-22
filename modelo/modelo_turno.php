<?php
include_once("helpers/conexion.php");

function getTurnos()
{
    $conn = getConexion();
    $query = "SELECT * FROM turno ORDER BY fecha;";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['fecha'] = $row['fecha'];
            $element['usuario'] = $row['usuario'];
            $element['centro_medico'] = $row['centro_medico'];
            $element['asistencia'] = $row['asistencia'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function addTurno($fecha, $usuario, $centro)
{
    $conn = getConexion();
    $query = "INSERT INTO turno (fecha, cliente, centro_medico) VALUES ('$fecha', $usuario, $centro);";
    execute_query($conn, $query);
}

?>