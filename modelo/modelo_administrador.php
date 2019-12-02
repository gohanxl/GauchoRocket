<?php

include_once("helpers/conexion.php");


function getAdminEstado($id)
{

    $conn = getConexion();
    $query = "SELECT * FROM usuario WHERE id = $id AND administrador = 1;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['administrador'];
}

function getVuelosTotales(){
    $conn = getConexion();
    $query = "
                SELECT id as label, 0 as y
                FROM vuelo;";

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


function getReporteTasaDeOcupacionGrafico($cabina)
{

    $conn = getConexion();

    $query = "SELECT P.vuelo as label, FORMAT((COUNT(DISTINCT P.id)*100/MC.capacidad),2) as y
                FROM pasaje P JOIN
                cabina C ON P.cabina = C.id JOIN
                vuelo V ON P.vuelo = V.id JOIN
                nave N ON V.nave = N.id JOIN
                modelo M ON N.modelo = M.id JOIN
                modelo_cabina MC ON m.id = MC.modelo
                WHERE C.descripcion LIKE '$cabina'
                AND P.cabina = MC.cabina
                GROUP BY V.id, V.nave, M.id;";


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
    $query = "
                SELECT year(P.fecha_compra) as ano, MONTHNAME(P.fecha_compra) as label, sum(P.precio) as y
                FROM pasaje P
                WHERE P.fecha_compra IS NOT NULL
                group by year(P.fecha_compra), month(P.fecha_compra);";

    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['ano'] = $row['ano'];
            $element['label'] = $row['label'];
            $element['y'] = $row['y'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function getFacturacionCliente()
{

    $conn = getConexion();
    $query = "
            SELECT P.cliente as label, CL.nombre, sum(P.precio) as y
                FROM pasaje P JOIN client CL ON P.cliente = CL.id
                WHERE P.fecha_compra IS NOT NULL
                group by P.cliente;";

    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['label'] = $row['label'];
            $element['nombre'] = $row['nombre'];
            $element['y'] = $row['y'];
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