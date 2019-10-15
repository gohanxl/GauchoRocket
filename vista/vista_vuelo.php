<form class="form mb-2" method="get" action="/vuelo/buscar">
    <div class="form-row">
        <div class="col-md-2 mb-2">
            <label for="inputTipo">Partida</label>
            <select id="inputTipo" class="form-control" name="origen" required>
                <option selected>Elegir origen...</option>
                <?php
                foreach ($locaciones as $locacion) {
                    echo "<option>" . $locacion['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="col-md-2 mb-2">
            <label for="inputTipo">Destino</label>
            <select id="inputTipo" class="form-control" name="destino" required>
                <option selected>Elegir destino...</option>
                <?php
                foreach ($locaciones as $locacion) {
                    echo "<option>" . $locacion['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="col-md-2 mb-2">
            <label for="buscar">Ida</label>
            <input class="form-control mr-sm-2" type="date" name="partida">
        </div>
        <div class="col-md-2 mb-2">
            <label for="buscar">Vuelta</label>
            <input class="form-control mr-sm-2" type="date" name="vuelta">
        </div>
        <div class="col-md-1 mb-1">
            <label for="buscar">Pasajes</label>
            <input class="form-control mr-sm-2" type="number" placeholder="" name="pasaje">
        </div>
        <div class="col-md-2 mb-2">
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
        <div class="col-md-1">
            <label for="submit"></label>
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </div>
</form>
<?php
if (isset($message)) {
    echo "<label class='text-danger'>" . $message . "</label>";
}
?>
<h3>Ida</h3>
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
        </tr>";}
    echo "
    </tbody>
    </table>";

    if (isset($vueltas)) {
        echo "
            <h3>Vuelta</h3>
            <table class=\"table table-hover\">
            <thead>
                <tr>
                    <th scope=\"col\">Origen</th>
                    <th scope=\"col\">Destino</th>
                    <th scope=\"col\">Duracion</th>
                    <th scope=\"col\">Nave</th>
                    <th scope=\"col\">Partida</th>
                </tr>
                </thead>
                <tbody>";
        foreach ($vueltas as $vuelta) {
            echo "
                    <tr>
                        <td>" . getLocacionDescripcion($vuelta['origen']) . "</td>
                        <td>" . getLocacionDescripcion($vuelta['destino']) . "</td>
                        <td>" . $vuelta['duracion'] . "</td>
                        <td>" . getNaveDescripcion($vuelta['nave']) . "</td>
                        <td>" . $vuelta['partida'] . "</td>
                    </tr>";
        }
        echo "
                </tbody>
                </table>";
    }
    ?>