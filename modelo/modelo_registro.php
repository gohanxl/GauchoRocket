<?php
include_once("helpers/conexion.php");

function registrarUsuario($user, $password, $email)
{
    $conn = getConexion();
    $query = "INSERT INTO usuario (user, password, email) VALUES ('$user', md5('$password'), '$email');";
    execute_query($conn, $query);
}