<?php
if (isset($_POST['vuelo'])) {
    $id = (int)$_POST['vuelo'];
    $vuelo = searchVueloId($id);
    $modelo = getNaveModelo($vuelo['nave']);
    $cabinas = getCabinaModelo($modelo);

/*    foreach ($cabinas as $cabina) {

        $pasajes = $cabina['capacidad'] - contadorPasajes($vuelo['id'], $cabina['cabina']);

        echo "imprime esto asd";

    echo $pasajes;*/
}
if (isset($_POST['submit'])){
  $pasaje = $_POST['pasaje'];
  $cabina = $_POST['cabina'];
  $contarPasaje = contadorPasajes($vuelo['id'], $cabina);
  $cabinaCapacidad = getCabinaModeloByCabina($cabina['cabina']);
  $cantidadPasajes = $cabinaCapacidad['capacidad'] - $contarPasaje;
  if($cantidadPasajes > $pasaje){
    echo "HACER COMPRA";
  }
  else{
      echo "INFORMAR QUE NO PUEDE";
  }
}
?>
<form action="alta" method="POST" enctype="application/x-www-form-urlencoded">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="destino">Origen</label>
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
        <div class="form-group col-md-2">
            <label for="inputCabina">Tipo de Cabina</label>
            <select id="inputCabina" class="form-control" name="cabina" required onchange="test()">
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
</form>
<button type="submit" class="btn btn-primary" name="submit">Comprar</button>
<button type="button" class="btn btn-secondary" onclick="window.location.replace('/')" name="cancel">Cancelar
</button>

<script>
    function test() {
        let pasaje = document.getElementById("pasaje");

        let cabina = document.getElementById("inputCabina");

        let selected = cabina.options[cabina.selectedIndex].value;

        return true;
    }
</script>