<form class="form mb-2" method="get" action="/vuelo/buscar">

    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="inputTipo">Partida</label>
            <select id="inputTipo" class="form-control" name="partida" required>
                <option selected>Elegir...</option>
                <?php
                foreach ($locaciones as $locacion) {
                    echo "<option>" . $locacion['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="inputTipo">Destino</label>
            <select id="inputTipo" class="form-control" name="locacion" required>
                <option selected>Elegir...</option>
                <?php
                foreach ($locaciones as $locacion) {
                    echo "<option>" . $locacion['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="buscar">Calendario</label>
            <input class="form-control mr-sm-2" type="date" name="calendar">
        </div>
        <div class="col-md-4 mb-3">
            <label for="buscar">Elija cantidad de pasajes</label>
            <input class="form-control mr-sm-2" type="number" placeholder="Pasajes" name="pasaje">
        </div>
        <div class="col-md-4 mb-3">
            <label for="buscar">Calendario</label>
            <input class="form-control mr-sm-2" type="date" placeholder="Buscar" name="nombre">
        </div>
        <div class="col-md-4 mb-3">
            <label for="inputCabina">Cabina</label>
            <select id="inputCabina" class="form-control" name="cabina" required>
                <option selected>Elegir...</option>
                <?php
                foreach ($cabinas as $cabina) {
                    echo "<option>" . $cabina['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
    </div>
</form>
<?php
if (isset($message)) {
    echo "<label class='text-danger'>" . $message . "</label>";
}
?>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Origen</th>
        <th scope="col">Destino</th>
        <th scope="col">Duracion</th>
        <th scope="col">Nave</th>
        <th scope="col">Partida</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($vuelos as $vuelo) {
        echo "    
        <tr>
            <td>" . getLocacionDescripcion($vuelo['origen']) . "</td>
            <td>" . getLocacionDescripcion($vuelo['destino']) . "</td>
            <td>" . $vuelo['duracion'] . "</td>
            <td>" . getNaveDescripcion($vuelo['nave']) . "</td>
            <td>" . $vuelo['partida'] . "</td>
        </tr>";
    };
    ?>
    </tbody>
</table>