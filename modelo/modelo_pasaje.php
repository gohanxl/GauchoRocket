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
function insertPasaje($vuelo_id, $cliente_id, $reserva_estado, $fecha_reserva, $codigo_reserva, $cabina_id, $origen, $destino, $precio)
{
    $conn = getConexion();
    $query = "INSERT INTO pasaje (vuelo, cliente, reserva, fecha_reserva, checkin, fecha_checkin, compra, fecha_compra, codigo, cabina, origen, destino, precio) 
                VALUES ($vuelo_id, $cliente_id, $reserva_estado,'$fecha_reserva', null, null, null, null, '$codigo_reserva'    , $cabina_id, $origen, $destino, $precio);";
    $result = execute_query_return_id($conn, $query);
    return $result;
}
function insertPasajeTrayecto($trayecto_id, $pasaje_id, $origen){
    $conn = getConexion();
    $query = "INSERT INTO vuelo_pasaje(vuelo_id, pasaje_id, escala) VALUES ($trayecto_id, $pasaje_id, $origen);";
    execute_query($conn, $query);
}
function getPasajesByCliente($cliente){
    $conn = getConexion();
    $query = "SELECT * FROM pasaje WHERE cliente = $cliente;";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['codigo'] = $row['codigo'];
            $element['vuelo'] = $row['vuelo'];
            $element['cliente'] = $row['cliente'];
            $element['origen'] = $row['origen'];
            $element['destino'] = $row['destino'];
            $element['reserva'] = $row['reserva'];
            $element['compra'] = $row['compra'];
            $element['checkin'] = $row['checkin'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}
function getPrecio($vuelo_id, $cabina_id){
    $conn = getConexion();
    $query = "SELECT * FROM precio_vuelo_cabina WHERE id_vuelo = $vuelo_id AND id_cabina = $cabina_id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['precio'];
}
function getPrecioPasaje($pasaje){
    $conn = getConexion();
    $query = "SELECT * FROM pasaje;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['precio'];
}