<?php

include_once("helpers/conexion.php");


function getAdminEstado($id)
{

    $conn = getConexion();
    $query = "SELECT * FROM usuario WHERE id = $id AND administrador = 1;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['administrador'];
}

function getReporteTasaDeOcupacionGrafico($cabina)
{

    $conn = getConexion();
    $query = "SELECT P.vuelo as label, (COUNT(DISTINCT P.id)*100/MC.capacidad) as y
                FROM pasaje P JOIN cabina C 
                    ON P.cabina = C.id JOIN
                    modelo_cabina MC ON MC.cabina = C.id
                    WHERE C.descripcion LIKE '$cabina'
                GROUP BY P.vuelo, P.cabina;";

    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['label'] = $row['label'];
            $element['y'] = $row['y'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}


function getReporteTasaDeOcupacion()
{

    $conn = getConexion();
    $query = "SELECT P.vuelo, P.cabina, COUNT(DISTINCT P.id) as pasajes, MC.capacidad, (COUNT(DISTINCT P.id)*100/MC.capacidad) as porcentaje
                FROM pasaje P JOIN cabina C 
                    ON P.cabina = C.id JOIN
                    modelo_cabina MC ON MC.cabina = C.id
                GROUP BY P.vuelo, P.cabina;";

    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['vuelo'] = $row['vuelo'];
            $element['cabina'] = $row['cabina'];
            $element['pasajes'] = $row['pasajes'];
            $element['capacidad'] = $row['capacidad'];
            $element['porcentaje'] = $row['porcentaje'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function getFacturacionMensual()
{
    $conn = getConexion();
    $query = "SELECT year(P.fecha_compra) as año, month(P.fecha_compra) as mes, sum(P.precio) as facturacion
                FROM pasaje P
                WHERE P.fecha_compra IS NOT NULL
                group by year(P.fecha_compra), month(P.fecha_compra);";

    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['año'] = $row['año'];
            $element['mes'] = $row['mes'];
            $element['facturacion'] = $row['facturacion'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function getFacturacionCliente()
{

    $conn = getConexion();
    $query = "SELECT P.cliente, CL.nombre, sum(P.precio) as facturacion
                FROM pasaje P JOIN client CL ON P.cliente = CL.id
                group by P.cliente;";

    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['cliente'] = $row['cliente'];
            $element['nombre'] = $row['nombre'];
            $element['facturacion'] = $row['facturacion'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function getCabinaMasVendida()
{
    $conn = getConexion();
    $query = "SELECT MAX(total) as cantidad, descripcion
                FROM (SELECT COUNT(P.cabina) as total, C.descripcion as descripcion FROM pasaje P JOIN cabina C on P.cabina = C.id
                        WHERE P.fecha_compra IS NOT NULL) as resultado;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function getCabinasVendidas()
{

    $conn = getConexion();
    $query = "SELECT total as y, descripcion as label
            FROM (SELECT COUNT(P.cabina) as total, C.descripcion as descripcion FROM pasaje P JOIN cabina C on P.cabina = C.id
            WHERE P.fecha_compra IS NOT NULL
            GROUP BY P.cabina, C.descripcion
            ) as resultado;";

    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['y'] = $row['y'];
            $element['label'] = $row['label'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;

}