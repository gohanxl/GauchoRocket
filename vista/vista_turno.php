<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['fecha']) && isset($_POST['centro']) && isset($_SESSION['user'])) {
        $fecha = $_POST['fecha'];
        $centro = $_POST['centro'];
        $usuario = $_SESSION['user'];

        $clienteId = getClienteId($usuario);
        $centroId = getCentroId($centro);
        addTurno($fecha, $clienteId, $centroId);
        addTipoCliente($clienteId);
        header("Location: /");
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