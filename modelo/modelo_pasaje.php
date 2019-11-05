<?php

include_once("helpers/conexion.php");

function contadorPasajes($vuelo_id, $cabina_id)
{
    $conn = getConexion();
    $query = "SELECT COUNT(*) FROM pasaje WHERE vuelo = $vuelo_id AND cabina = $cabina_id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result);
}