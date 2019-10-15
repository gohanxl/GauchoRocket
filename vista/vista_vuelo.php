<form class="form-inline mb-2" method="get" action="/vuelo/buscar">
    <label for="inputTipo">Partida</label>
    <select id="inputTipo" class="form-control" name="partida" required>
        <option selected>Elegir...</option>
        <?php
        foreach ($locaciones as $locacion) {
            echo "<option>" . $locacion['descripcion'] . "</option>";
        };
        ?>
    </select>
    <label for="inputTipo">Destino</label>
    <select id="inputTipo" class="form-control" name="locacion" required>
        <option selected>Elegir...</option>
        <?php
        foreach ($locaciones as $locacion) {
            echo "<option>" . $locacion['descripcion'] . "</option>";
        };
        ?>
    </select>
    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" name="nombre">
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
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