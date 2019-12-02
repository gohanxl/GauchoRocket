<?php

$locaciones = getLocacion();
$naves = getNaves();
$tiposDeVuelo = getTipoVuelo();
$circuitos = getCircuitos();


if (isset($_POST['submit'])) {

    $origen = "";
    $destino = "";
    $tipo_vuelo_desc = "";
    $fecha_vuelo = "";
    $hora = "";

    if (isset($_POST['origen'])) {
        $origen = str_replace('+', ' ', $_POST['origen']);
    }
    if (isset($_POST['destino'])) {
        $destino = str_replace('+', ' ', $_POST['destino']);
    }

    if (isset($_POST['tipoVuelo'])) {
        $tipo_vuelo_desc = str_replace('+', ' ', $_POST['tipoVuelo']);
    }

    if (isset($_POST['partida'])) {
        $fecha_vuelo = str_replace('-', '', $_POST['partida']);
    }

    if (isset($_POST['hora'])) {
        $hora = str_replace(':', '', $_POST['hora']);
        $hora = $hora . '00';
    }


    $duracion = $_POST['duracion'];
    $nave = $_POST['nave'];

    if (isset($_POST['circuito'])) {
        $circuito = $_POST['circuito'];
    } else {
        $circuito = null;
    }

    echo $hora;
    echo $fecha_vuelo;

    addVuelo(getLocacionId($origen), getLocacionId($destino), $duracion, getNaveId($nave), $fecha_vuelo, $hora, getTipoVueloIdByDescripcion($tipo_vuelo_desc), $circuito);

}

?>

<h2>Alta de Vuelo</h2>
<form action="" method="POST" enctype="application/x-www-form-urlencoded">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="origen">Origen</label>
            <select id="inputState" class="form-control" name="origen">
                <option selected>Elegir Origen...</option>
                <?php

                foreach ($locaciones as $locacion) {
                    echo "<option>" . getLocacionDescripcion($locacion['id']) . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="destino">Destino</label>
            <select id="inputState" class="form-control" name="destino">
                <option selected>Elegir Destino...</option>
                <?php
                foreach ($locaciones as $locacion) {
                    echo "<option>" . getLocacionDescripcion($locacion['id']) . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="duracion">Duración</label>
            <input type="number" class="form-control" id="duracion" placeholder="Duracion" name="duracion">
        </div>
        <div class="col-md-6 mb-3">
            <label for="partida">Fecha</label>
            <input class="form-control mr-sm-2" value="" type="date" name="partida">
        </div>
        <div class="col-md-6 mb-3">
            <label for="hora">Hora</label>
            <input class="form-control mr-sm-2" value="" type="time" name="hora">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nave">Nave</label>
            <select id="inputState" class="form-control" name="nave">
                <option selected>Choose...</option>
                <?php
                foreach ($naves as $nave) {

                    echo "<option>" . $nave['matricula'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="tipoVuelo">Tipo de vuelo</label>
            <select id="tipoVuelo" class="form-control" onchange="disabledOnSelect()" name="tipoVuelo">
                <option selected>Elegir Tipo de Vuelo...</option>
                <?php
                foreach ($tiposDeVuelo as $tipo) {

                    echo "<option>" . $tipo['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="circuito">Circuito</label>
            <select id="circuito" class="form-control" name="circuito" disabled>
                <option selected>Elegir Circuito...</option>
                <?php
                foreach ($circuitos as $circuito) {

                    echo "<option value=" . $circuito['id'] . ">" . $circuito['id'] . "</option>";
                };
                ?>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <button class="btn btn-primary btn-block mt-2" type="submit" class="form-control" id="submit" name="submit">
                Agregar Vuelo
            </button>
            <button class="btn btn-danger btn-block mt-2" onclick="window.location='/'">Cancelar</button>
        </div>
        <div class="col-sm-9"><span><b>Trayecto 1:</b> Buenos Aires - EEI - Orbita Hotel - Luna - Marte</span><br>
            <span><b>Trayecto 2:</b> Ankara - EEI - Orbita Hotel - Luna - Marte</span><br>
            <span><b>Trayecto 3:</b> Buenos Aires - EEI - Ganimedes - Europa - Io - Encedalo - Titan</span><br>
            <span><b>Trayecto 4:</b> Ankara - EEI - Ganimedes - Europa - Io - Encedalo - Titan</span></div>

    </div>
</form>
<script>
    function disabledOnSelect() {
        let circuito = document.getElementById("circuito");

        let tipoVuelo = document.getElementById("tipoVuelo");

        if (tipoVuelo.selectedIndex === 1) {
            circuito.disabled = false;
        } else {
            circuito.disabled = true;
        }
    }
</script>
