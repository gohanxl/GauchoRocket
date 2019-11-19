<?php

if (isset($_POST['vuelo'])) {
    $id = (int)$_POST['vuelo'];
    $vuelo = searchVueloId($id);
    $modelo = getNaveModelo($vuelo['nave']);
    $cabinas = getCabinaModelo($modelo);
    $tipo_vuelo = getIdTipoVuelo($id);
}

if(isset($_POST['reserva'])){

    $vueloId = $_POST['vueloReserva'];
    $tipo_vuelo = $_POST['tipo_vuelo'];
    $trayectoId = $_POST['trayectoId'];
    $codigo = $_POST['codigo'];
    $cabina = $_POST['cabina'];
    $pasaje = $_POST['pasaje']-1;

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
        $pasajeId = insertPasaje($vueloId, $cliente, 1, date("Y-m-d H:i:s"), $codigo, $cabina);
        if($tipo_vuelo == "Entre destino"){
            insertPasajeTrayecto($trayectoId, $pasajeId);
        }
    }

    header('Location: /pasaje/exito');
}

if (isset($_POST['submit'])) {

    $cliente = getClienteId($_SESSION['user']);
    $cabina = $_POST['cabina'];
    $vueloId = $_POST['vuelo'];
    $vuelo = searchVueloId($vueloId);
    $modelo = getNaveModelo($vuelo['nave']);
    $tipo_vuelo = getDescriptionTipoVuelo($vuelo['tipo_vuelo']);
    $pasaje = $_POST['pasaje'];
    $pasajes = contadorPasajes($vuelo['id'], $cabina);
    $capacidad = getCabinaCapacidad($modelo, $cabina);

    if ($tipo_vuelo == "Entre destino"){
        $origen = getLocacionDescripcion(getOrigenByVueloId($vueloId));
        $origenId = getLocacionId($origen);
        $destino = getLocacionDescripcion(getDestinoByVueloId($vueloId));
        $trayecto = getDescripcionCircuitoById(getCircuito($vueloId));
        $circuitoId = getCircuito($vueloId);
        $trayectoId = getTrayecto($vueloId);
        $circuito = getTrayectosByDescripcion($trayecto);
        $flag = false;
        $i = 0;
        $max = 0;
        // while que recorra hasta destino sin incluir flag que active true cuando encuentre el origen y comienze a hacer los count
        //for que recorra array y cuente el maximo de pasajes en ese trayecto( buscar en tabla trayecto por vuelo id origen comparado con origen del array
        //contador por trayecto_pasaje - insert en esa tabla cada vez que se cree un pasaje entre destino.
        while($destino != $circuito[$i]){
            if($circuito[$i] == $origen){
                $flag = true;
            }

            if($flag){
                $pasajes = contadorPasajesTrayecto($origenId, $circuitoId, $cabina);
                if($pasajes > $max){
                    $max = $pasajes;
                }
            }

            $i++;
        }
        $total = $capacidad - $max;
    }
    else{
        $pasajes = contadorPasajes($vuelo['id'], $cabina);
        $total = $capacidad - $pasajes;
    }

    if ($pasaje < $total) {
        $codigo = bin2hex(random_bytes(5));
        $pasajeId = insertPasaje($vueloId, $cliente, 1, date("Y-m-d H:i:s"), $codigo, $cabina);
        if($tipo_vuelo == "Entre destino"){
            insertPasajeTrayecto($trayectoId, $pasajeId);
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
                      <input type='hidden' name='codigo' value='$codigo'>
                      <input type='hidden' name='cabina' value='$cabina'>
                      <input type='hidden' name='tipo_vuelo' value='$tipo_vuelo'>
                      <input type='hidden' name='trayectoId' value='$trayectoId'>
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
        <div class="form-group col-md-3">
            <label for="origen">Origen</label>
            <input type="text" class="form-control" id="origen" name="origen"
                   value="<?php echo getLocacionDescripcion($vuelo['origen']) ?>"
                   disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="destino">Destino</label>
            <input type="text" class="form-control" id="destino" name="destino"
                   value="<?php echo getLocacionDescripcion($vuelo['destino']) ?>"
                   disabled>
        </div>
        <div class="form-group col-md-2">
            <label for="partido">Partida</label>
            <input type="text" class="form-control" id="partido" name="partida" value="<?php echo $vuelo['partida'] ?>"
                   disabled>
        </div>
        <input type="hidden" id="vuelo" name="vuelo" value="<?php echo $vuelo['id'] ?>">
        <div class="form-group col-md-2">
            <label for="inputCabina">Tipo de Cabina</label>
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

        return pasaje.value = selected;
    }
</script>