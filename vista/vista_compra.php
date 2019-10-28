<?php
if (isset($_POST['vuelo'])){
    $id = (int)$_POST['vuelo'];
    $vuelo = searchVueloId($id);
}

?>

<form action="alta" method="POST" enctype="application/x-www-form-urlencoded">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputFecha">Fecha</label>
            <input type="date" class="form-control" id="inputFecha" name="fecha" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputCentro">Centro medico</label>
            <select id="inputCentro" class="form-control" name="centro" required>
                <option selected value="">Elegir...</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Comprar</button>
    <button type="button" class="btn btn-secondary" onclick="window.location.replace('/')" name="cancel">Cancelar
    </button>