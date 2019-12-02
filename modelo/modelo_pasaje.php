<?php
include_once("helpers/conexion.php");
function contadorPasajes($vuelo_id, $cabina_id)
{
    $conn = getConexion();
    $query = "SELECT COUNT(*) AS count FROM pasaje WHERE vuelo = $vuelo_id AND cabina = $cabina_id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['count'];
}

function contadorPasajeEspera($vuelo_id, $cabina_id){
    $conn = getConexion();
    $query = "SELECT COUNT(*) AS count FROM pasaje WHERE vuelo = $vuelo_id AND cabina = $cabina_id AND compra IS NOT NULL;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['count'];
}


function contadorPasajeTrayectoEspera($origen, $circuito, $cabina){
    $conn = getConexion();
    $query = "SELECT COUNT(*) AS count FROM vuelo_pasaje VP JOIN 
                vuelo V ON VP.vuelo_id = V.id JOIN
                pasaje P ON P.id = VP.pasaje_id
                WHERE VP.escala = $origen AND V.circuito = $circuito AND P.cabina = $cabina AND P.compra IS NOT NULL
                GROUP BY VP.vuelo_id;";
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
function insertPasaje($vuelo_id, $cliente_id, $reserva_estado, $fecha_reserva, $codigo_reserva, $cabina_id, $servicio_id, $origen, $destino, $precio, $espera)
{
    $conn = getConexion();
    $query = "INSERT INTO pasaje (vuelo, cliente, reserva, fecha_reserva, checkin, fecha_checkin, compra, fecha_compra, codigo, cabina, servicio, origen, destino, precio, espera) 
                VALUES ($vuelo_id, $cliente_id, $reserva_estado,'$fecha_reserva', null, null, null, null, '$codigo_reserva'    , $cabina_id, $servicio_id, $origen, $destino, $precio, $espera);";
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
    $query = "SELECT P.* FROM pasaje P
                JOIN vuelo V ON P.vuelo = V.id
                WHERE P.cliente = $cliente AND
                CONCAT(V.partida, ' ', V.hora) > DATE_SUB(NOW(), INTERVAL 2 HOUR);";
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
            $element['precio'] = $row['precio'];
            $element['espera'] = $row['espera'];
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
    $query = "SELECT * FROM pasaje WHERE id= $pasaje;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['precio'];
}

function getCapacidadCabina($cabina, $modelo){
    $conn = getConexion();
    $query = "SELECT MC.capacidad AS count
                FROM modelo_cabina MC
                WHERE MC.cabina = $cabina AND MC.modelo = $modelo;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['count'];
}

function getModeloPasaje($pasajeId){
    $conn = getConexion();
    $query = "SELECT M.id AS modelo FROM modelo M JOIN
                nave N ON N.modelo = M.id JOIN
                vuelo V ON n.id = V.nave JOIN
                pasaje P ON V.id = P.vuelo
                WHERE P.id = $pasajeId;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['modelo'];
}

function getCabinaPasaje($pasaje){
    $conn = getConexion();
    $query = "SELECT * FROM pasaje WHERE id= $pasaje;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['cabina'];
}

function getVueloPasaje($pasaje){
    $conn = getConexion();
    $query = "SELECT * FROM pasaje WHERE id= $pasaje;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['vuelo'];
}


function getAsientos($cabina, $vuelo){
    $conn = getConexion();
    $query = "
        SELECT asiento FROM pasaje
        WHERE cabina = $cabina AND vuelo = $vuelo;
    ";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['asiento'] = $row['asiento'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function compraPasaje($id, $date){
    $conn = getConexion();
    $query = "UPDATE pasaje SET compra = true, fecha_compra='$date' WHERE id = $id;";
    execute_query($conn, $query);
}

function checkinPasaje($id, $date, $asiento){
    $conn = getConexion();
    $query = "UPDATE pasaje SET checkin = true, fecha_checkin='$date', asiento=$asiento WHERE id = $id;";
    execute_query($conn, $query);
}
