<?php
function getUsuarioId($user)
{
    $conn = getConexion();
    $query = "SELECT * FROM usuario WHERE user LIKE '$user';";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['id'];
}

function getNombreClienteByIdUsuario($idUsuario){
    $conn = getConexion();
    $query = "SELECT * FROM client WHERE usuario = $idUsuario;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['nombre'];
}

function getClienteId($idUsuario)
{
    $conn = getConexion();
    $query = "SELECT * FROM client WHERE usuario = $idUsuario;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['id'];
}

function addCliente($user, $userId, $telefono, $fecha_nacimiento){

    $conn = getConexion();
    $query = "INSERT INTO client (nombre, tipo_cliente, usuario, telefono, foto, fecha_nacimiento)
                VALUES('$user', null, $userId, '$telefono', ' ', '$fecha_nacimiento');";
    execute_query($conn, $query);
}

function registrarCliente($usuario){
    $conn = getConexion();
    $query = "INSERT INTO client (usuario) VALUES ($usuario);";
    execute_query($conn, $query);
}

function getTipoCliente($usuario_id){
    $conn = getConexion();
    $query = "SELECT * FROM client WHERE id = $usuario_id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['tipo_cliente'];
}

function getUsuarioIdByEmail($email){
    $conn = getConexion();
    $query = "SELECT * FROM usuario WHERE email = '$email';";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['id'];
}