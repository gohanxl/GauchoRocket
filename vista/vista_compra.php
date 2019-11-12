<?php

if (isset($_POST['vuelo'])) {
    $id = (int)$_POST['vuelo'];
    $vuelo = searchVueloId($id);
    $modelo = getNaveModelo($vuelo['nave']);
    $cabinas = getCabinaModelo($modelo);

}

if (isset($_POST['submit'])) {


    $cliente = getClienteId($_SESSION['user']);
    $cabina = $_POST['cabina'];
    $vuelo = searchVueloId($id);
    $modelo = getNaveModelo($vuelo['nave']);
    $pasajes = contadorPasajes($vuelo['id'], $cabina);

    $capacidad = getCabinaCapacidad($modelo, $cabina);

    $total = $capacidad - $pasajes;


    if ($_POST['pasaje'] < $total) {

        insertPasaje($_POST['vuelo'], $cliente, 1, date("Y-m-d H:i:s"), bin2hex(random_bytes(5)), $_POST['cabina']);

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
            <input type="number" class="form-control" id="pasaje" name="pasaje" max=""
                   value="" required>
        </div>
    </div>
    <?php
        if(isset($error)){
            echo "<p style='color: red;'>" . $error . "</p>";
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