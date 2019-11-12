<?php

if (isset($_POST['vuelo'])) {
    $id = (int)$_POST['vuelo'];
    $vuelo = searchVueloId($id);
    $modelo = getNaveModelo($vuelo['nave']);
    $cabinas = getCabinaModelo($modelo);

}

if(isset($_POST['reserva'])){


}

if (isset($_POST['submit'])) {

    $cliente = getClienteId($_SESSION['user']);
    $cabina = $_POST['cabina'];
    $vueloId = $_POST['vuelo'];
    $vuelo = searchVueloId($id);
    $modelo = getNaveModelo($vuelo['nave']);
    $pasaje = $_POST['pasaje'];
    $pasajes = contadorPasajes($vuelo['id'], $cabina);

    $capacidad = getCabinaCapacidad($modelo, $cabina);

    $total = $capacidad - $pasajes;


    if ($pasaje < $total) {
        $codigo = bin2hex(random_bytes(5));
        insertPasaje($vueloId, $cliente, 1, date("Y-m-d H:i:s"), $codigo, $cabina);

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
                      ";
                        for($i=0;$i<$pasaje-1;$i++){
                            echo "
                              <div class=\"form-group\">
                                <label for=\"exampleInputEmail1\">Email</label>
                                <input type=\"email\" class=\"form-control\" id=\"email" . $i . "\" aria-describedby=\"emailHelp\" placeholder=\"Ingrese email\" required>
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