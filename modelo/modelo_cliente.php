<?php
function getUsuarioId($user)
{
    $conn = getConexion();
    $query = "SELECT * FROM usuario WHERE user LIKE '$user';";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['id'];
}

function getClienteId($idUsuario)
{
    $conn = getConexion();
    $query = "SELECT * FROM client WHERE usuario LIKE '$idUsuario';";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['id'];
}