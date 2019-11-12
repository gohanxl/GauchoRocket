<?php
$routes = parseRoutes();
$moduleName = extractModuleName($routes);
$action = extractActionName($routes);
$_GET = extractGetParams();


session_start();

if (empty($_SESSION['logged']) && $moduleName == 'login' || $moduleName == 'registro') {
    $filename = "controlador/controlador_" . $moduleName . ".php";
    if (file_exists($filename)) {
        include_once($filename);
        call_user_func($moduleName . '_' . $action);
    } else {
        include_once("public/header.php");
        include_once("vista/vista_404.php");
        include_once("public/footer.php");
    }
} else {

    include_once("public/header.php");

    $filename = "controlador/controlador_" . $moduleName . ".php";
    if (file_exists($filename)) {
        include_once($filename);
        call_user_func($moduleName . '_' . $action);
    } else {
        include_once("vista/vista_404.php");
    }
    include_once("public/footer.php");
}

function parseRoutes()
{
    $urlAndParams = explode('?', $_SERVER['REQUEST_URI']);
    return explode('/', $urlAndParams[0]);
}

function extractModuleName($routes)
{
    return !empty($routes[1]) ? $routes[1] : "vuelo";
}

function extractActionName($routes)
{
    return !empty($routes[2]) ? $routes[2] : "index";
}

function extractGetParams()
{

    $getParams = array();
    if (isset($_SERVER["REQUEST_URI"])) {

        // Separo la URL de los parametros tipo GET
        $requestPath = explode("?", $_SERVER['REQUEST_URI']);

        // Obtengo los parametros tipo GET si es que existen
        if (isset($requestPath[1])) {

            $path["query_utf8"] = $requestPath[1];
            $path["query"] = utf8_decode($path["query_utf8"]);

            // Parseo los parametros tipo GET en un array asociativo
            $vars = explode('&', $path["query"]);
            foreach ($vars as $var) {
                $param = explode('=', $var, 2);
                if (count($param) == 2) {
                    $getParams[$param[0]] = $param[1];
                }
            }
        }
    }
    return $getParams;
}

?>