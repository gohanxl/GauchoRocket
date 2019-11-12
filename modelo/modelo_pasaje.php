<?php

include_once("helpers/conexion.php");

function contadorPasajes($vuelo_id, $cabina_id)
{

    $conn = getConexion();
    $query = "SELECT COUNT(*) AS count FROM pasaje WHERE vuelo = $vuelo_id AND cabina = $cabina_id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['count'];

}

function insertPasaje($vuelo_id, $cliente_id, $reserva_estado, $fecha_reserva, $codigo_reserva, $cabina_id)
{

    $conn = getConexion();
    $query = "INSERT INTO pasaje (vuelo, cliente, reserva, fecha_reserva, checkin, fecha_checkin, compra, fecha_compra, codigo,precio, cabina) 
                VALUES ($vuelo_id, $cliente_id, $reserva_estado,'$fecha_reserva', null, null, null, null, '$codigo_reserva', null, $cabina_id);";
    execute_query($conn, $query);
}