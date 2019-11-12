<?php
include_once("helpers/conexion.php");

function registrarUsuario($id, $user, $password, $email)
{
    $conn = getConexion();
    $query = "INSERT INTO usuario (id, user, password, email) VALUES ($id,'$user', md5('$password'), '$email');";
    execute_query($conn, $query);
}