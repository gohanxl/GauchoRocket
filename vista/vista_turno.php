<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['fecha']) && isset($_POST['centro']) && isset($_SESSION['user'])) {
        $fecha = $_POST['fecha'];
        $centro = $_POST['centro'];
        $usuario = $_SESSION['user'];

        $clienteId = getClienteId($usuario);
        $centroId = getCentroId($centro);

        $total = getCentroTurnos($centroId);
        $turnos = contadorTurnos($fecha, $centroId);
        date_default_timezone_set("America/Argentina/Buenos_Aires");

        if(date("Y-m-d") > $fecha){
            $error = "No puede seleccionar una fecha menor que la actual.";
        }
        elseif($total-$turnos){
            addTurno($fecha, $clienteId, $centroId);
            addTipoCliente($clienteId);
            header("Location: /");
        }
        else{
            $error = "No se entregan más turnos en " . $centro . " para la fecha " . $fecha . ".";
        }
    };
}

if(!is_null(getTipoCliente(getClienteId($_SESSION['user'])))){
    echo"
    <div class=\"jumbotron jumbotron-fluid\">
        <div class=\"container\">
            <h2 class=\"display-4\">Estudios médicos aprobados</h2>
            <p class=\"lead\">Según los estudios médicos usted es un cliente de tipo " . getTipoCliente(getClienteId($_SESSION['user'])) . ".</p>
        </div>
    </div>
    ";
}
else{
    echo"
    <h2>Solicitud de turno</h2>
    <p>Eliga el día y su centro méidco más cercano para realizar los chequeos médicos correspondientes.</p>
    
   ";
     if(isset($error)){
         echo "<p class='text-danger'>$error</p>";
     }   ;
    echo"
    <form action=\"alta\" method=\"POST\" enctype=\"application/x-www-form-urlencoded\">
    <div class=\"form-row\">
        <div class=\"form-group col-md-4\">
            <label for=\"inputFecha\">Fecha</label>
            <input type=\"date\" class=\"form-control\" id=\"inputFecha\" name=\"fecha\" required>
        </div>
        <div class=\"form-group col-md-4\">
            <label for=\"inputCentro\">Centro medico</label>
            <select id=\"inputCentro\" class=\"form-control\" name=\"centro\" required>
                <option selected value=\"\">Elegir...</option>
    ";
            foreach ($centros as $centro) {
                echo "<option>" . $centro['nombre'] . "</option>";
            };
    echo"
        </select>
        </div>
    </div>
    <button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Reservar</button>
    <button type=\"button\" class=\"btn btn-secondary\" onclick=\"window.location.replace('/')\" name=\"cancel\">Cancelar
    </button>
</form>
    ";
}