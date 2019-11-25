<?php

include_once("helpers/conexion.php");

function contadorPasajes($vuelo_id, $cabina_id)
{
    $conn = getConexion();
    $query = "SELECT COUNT(*) AS count FROM pasaje WHERE vuelo = $vuelo_id AND cabina = $cabina_id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['count'];
}

function contadorPasajesTrayecto($origen, $circuito, $cabina)
{
    $conn = getConexion();
    $query = "SELECT COUNT(*) AS count FROM vuelo_pasaje VP JOIN 
                vuelo V ON VP.vuelo_id = V.id JOIN
                pasaje P ON P.id = VP.pasaje_id
                WHERE VP.escala = $origen AND V.circuito = $circuito AND P.cabina = $cabina
                GROUP BY VP.vuelo_id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['count'];
}

function insertPasaje($vuelo_id, $cliente_id, $reserva_estado, $fecha_reserva, $codigo_reserva, $cabina_id, $origen, $destino)
{
    $conn = getConexion();
    $query = "INSERT INTO pasaje (vuelo, cliente, reserva, fecha_reserva, checkin, fecha_checkin, compra, fecha_compra, codigo,precio, cabina, origen, destino) 
                VALUES ($vuelo_id, $cliente_id, $reserva_estado,'$fecha_reserva', null, null, null, null, '$codigo_reserva', null, $cabina_id, $origen, $destino);";
    $result = execute_query_return_id($conn, $query);
    return $result;
}

function insertPasajeTrayecto($trayecto_id, $pasaje_id, $origen){
    $conn = getConexion();
    $query = "INSERT INTO vuelo_pasaje(vuelo_id, pasaje_id, escala) VALUES ($trayecto_id, $pasaje_id, $origen);";
    execute_query($conn, $query);
}