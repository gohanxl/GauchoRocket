<?php

if (isset($_POST['vuelo'])) {
    $id = (int)$_POST['vuelo'];
    if(isset($_POST['espera'])){
        $espera = 1;
    }
    else{
        $espera = 0;
    }
    $vuelo = searchVueloId($id);
    $modelo = getNaveModelo($vuelo['nave']);
    $servicios = getServicios();
    $cabinas = getCabinaModelo($modelo);
    $tipo_vuelo = getIdTipoVuelo($id);
}

if(isset($_POST['reserva'])){

    $origenId = $_POST['origenId'];
    $destinoId = $_POST['destinoId'];
    $vueloId = $_POST['vueloReserva'];
    $tipo_vuelo = $_POST['tipo_vuelo'];
    $servicio = $_POST['servicio'];
    $codigo = $_POST['codigo'];
    $cabina = $_POST['cabina'];
    echo $cabina;
    $pasaje = $_POST['pasaje']-1;
    $espera = $_POST['espera'];

    for($i=0;$i<$pasaje;$i++){
        $pass = bin2hex(random_bytes(4));
        $existe = getUsuarioIdByEmail($_POST['email'.$i]);
        if(empty($existe)){
            registrarUsuario($_POST['email'.$i], $pass, $_POST['email'.$i]);
            $usuarioId = getUsuarioIdByEmail($_POST['email'.$i]);
            registrarCliente($usuarioId);
        }
    }
    for($i=0;$i<$pasaje;$i++){
        $usuarioId = getUsuarioIdByEmail($_POST['email'.$i]);
        $cliente = getClienteId($usuarioId);
        $precio = getPrecio($vueloId, $cabina);
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $pasajeId = insertPasaje($vueloId, $cliente, 1, date("Y-m-d H:i:s"), $codigo, $cabina, $servicio, $origenId, $destinoId, $precio, $espera);
        if($tipo_vuelo == "Entre destino"){
            insertPasajeTrayecto($vueloId, $pasajeId, $origenId);
        }
    }

    if($espera){
        header('Location: /pasaje/espera');
    }
    else{
        header('Location: /pasaje/exito');
    }
}

if (isset($_POST['submit'])) {

    $origenId = $_POST['origen'];
    $destinoId = $_POST['destino'];
    $origen = getLocacionDescripcion($origenId);
    $destino = getLocacionDescripcion($destinoId);
    $cliente = getClienteId($_SESSION['user']);
    $cabina = $_POST['cabina'];
    $vueloId = $_POST['vuelo'];
    $circuitoId = $vuelo['circuito'];
    $vuelo = searchVueloId($vueloId);
    $modelo = getNaveModelo($vuelo['nave']);
    $tipo_vuelo = getDescriptionTipoVuelo($vuelo['tipo_vuelo']);
    $pasaje = $_POST['pasaje'];
    $espera = $_POST['espera'];
    $pasajes = 0;
    if($espera){
        $pasajes = contadorPasajeEspera($vuelo['id'], $cabina);
    }
    else{
        $pasajes = contadorPasajes($vuelo['id'], $cabina);
    }
    $capacidad = getCabinaCapacidad($modelo, $cabina);

    $servicio = $_POST['servicio'];

    if ($tipo_vuelo == "Entre destino"){
        $circuito = getTrayectos(getDescripcionCircuitoById($circuitoId));
        $flag = false;
        $i = 0;
        $max = 0;

        while($destino != $circuito[$i]){
            if($circuito[$i] == $origenId){
                $flag = true;
            }

            if($flag){
                if($espera){
                    $pasajes = contadorPasajeTrayectoEspera($origenId, $circuitoId, $cabina);
                }
                else{
                    $pasajes = contadorPasajesTrayecto($origenId, $circuitoId, $cabina);
                }
                if($pasajes > $max){
                    $max = $pasajes;
                }
            }
            $i++;
        }
        $total = $capacidad - $max;
    }
    else{
        if($espera){
            $pasajes = contadorPasajeEspera($vuelo['id'], $cabina);
        }
        else{
            $pasajes = contadorPasajes($vuelo['id'], $cabina);
        }
        $total = $capacidad - $pasajes;
    }

    if ($pasaje < $total) {
        $codigo = bin2hex(random_bytes(5));
        $precio = getPrecio($vueloId, $cabina);
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $pasajeId = insertPasaje($vueloId, $cliente, 1, date("Y-m-d H:i:s"), $codigo, $cabina, $servicio, $origenId, $destinoId, $precio, $espera);
        if($tipo_vuelo == "Entre destino"){
            insertPasajeTrayecto($vueloId, $pasajeId, $origenId);
        }
        if ($pasaje > 1) {
            echo "
                <div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
                  <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                    <div class=\"modal-content\">
                      <div class=\"modal-header\">
                        <h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Reserva de pasajes</h5>

                      </div>
                      <div class=\"modal-body\">
                      <form action='#' method='POST'>
                      <input type='hidden' name='pasaje' value='$pasaje'>
                      <input type='hidden' name='vueloReserva' value='$vueloId'>
                      <input type='hidden' name='origenId' value='$origenId'>
                      <input type='hidden' name='destinoId' value='$destinoId'>
                      <input type='hidden' name='codigo' value='$codigo'>
                      <input type='hidden' name='cabina' value='$cabina'>
                      <input type='hidden' name='tipo_vuelo' value='$tipo_vuelo'>
                      <input type='hidden' name='espera' value='$espera'>
                      <input type='hidden' name='servicio' value='$servicio'>
                      ";
                        for($i=0;$i<$pasaje-1;$i++){
                            echo "
                              <div class=\"form-group\">
                                <label for=\"exampleInputEmail1\">Email</label>
                                <input type=\"email\" class=\"form-control\" name='email". $i . "' id=\"email" . $i . "\" aria-describedby=\"emailHelp\" placeholder=\"Ingrese email\" required>
                              </div>
                            ";
                        }
                        echo"
                      </div>
                      <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancelar</button>
                        <input type=\"submit\" class=\"btn btn-primary\" name='reserva' value='Reservar'>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
            <script>
                $('#myModal').modal('show');
            </script>";
        }
        else{
            header('Location: /pasaje/exito');
        }
    } else {
        $error = "No es posible comprar esa cantidad. La cantidad máxima es " . $total;
    }
}
?>
<form action="" method="POST" enctype="application/x-www-form-urlencoded">

    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="origen">Origen</label>
            <?php
            if(getDescriptionTipoVuelo($vuelo['tipo_vuelo']) == "Entre destino"){
                echo "<select class='form-control' id='origen' name='origen' required>";
                foreach (getTrayectos(getDescripcionCircuitoById($vuelo['circuito'])) as $trayecto) {
                    echo "<option value=" . getLocacionId($trayecto) . ">" . $trayecto . "</option>";
                };
                echo "</select>";
            }
            else{
            echo "
            <select class='form-control' id='origen' name='origen' required readonly>
            <option value=" . $vuelo['origen'] . " >" . getLocacionDescripcion($vuelo['origen']);
            };
            echo "</select>";
            ?>
        </div>
        <div class="form-group col-md-2">
            <label for="destino">Destino</label>
            <?php
            if(getDescriptionTipoVuelo($vuelo['tipo_vuelo']) == "Entre destino"){
                echo "<select class='form-control' id='destino' name='destino'>";
                foreach (getTrayectos(getDescripcionCircuitoById($vuelo['circuito'])) as $trayecto) {
                    echo "<option value=" . getLocacionId($trayecto) . ">" . $trayecto . "</option>";
                };
                echo "</select>";
            }
            else{
            echo "
            <select class='form-control' id='destino' name='destino' readonly>
            <option value=" . $vuelo['destino'] . " >" . getLocacionDescripcion($vuelo['destino']) ;
            };
            echo "</select>";
            ?>
        </div>
        <div class="form-group col-md-2">
            <label for="partido">Partida</label>
            <input type="text" class="form-control" id="partida" name="partida" value="<?php echo $vuelo['partida'] ?>"
                   disabled>
        </div>
        <input type="hidden" id="vuelo" name="vuelo" value="<?php echo $vuelo['id'] ?>">
        <input type="hidden" id="espera" name="espera" value="<?php echo $espera ?>">
        <div class="form-group col-md-2">
            <label for="inputCabina">Tipo de cabina</label>
            <select id="inputCabina" class="form-control" name="cabina" required>
                <option selected value="">Elegir...</option>
                <?php
                foreach ($cabinas as $cabina) {
                    echo "<option value=" . $cabina['cabina'] . ">" . getCabinaDescripcion($cabina['cabina']) . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputServicio">Tipo de servicio</label>
            <select id="inputServicio" class="form-control" name="servicio" required>
                <option selected value="">Elegir...</option>
                <?php
                foreach ($servicios as $servicio) {
                    echo "<option value=" . $servicio['id'] . ">" . $servicio['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPasaje">Pasaje</label>
            <input type="number" class="form-control" id="pasaje" name="pasaje" required>
        </div>
    </div>
    <?php
    if (isset($error)) {
        echo "<p style='color: #ff0000;'>" . $error . "</p>";
    }
    ?>
    <button type="submit" class="btn btn-primary" name="submit">Comprar</button>
    <button type="button" class="btn btn-secondary" onclick="window.location.replace('/')" name="cancel">Cancelar
</form>
</button>

<script>
    function test() {
        let pasaje = document.getElementById("pasaje");

        let cabina = document.getElementById("inputCabina");

        let selected = cabina.options[cabina.selectedIndex].value;

        return true;
    }
</script>