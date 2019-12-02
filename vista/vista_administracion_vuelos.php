<?php

?>

<h2>Alta de vuelo</h2>
<form>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputState">Origen</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputState">Destino</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmail4">Duración</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="col-md-3 mb-2">
            <label for="partida">Fecha</label>
            <input class="form-control mr-sm-2" value="" type="date" name="partida">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputState">Nave</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputState">Tipo de vuelo</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputState">Circuito</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <input type="submit" class="form-control" id="submit" name="submit">
            <button class="btn btn-danger btn-block mt-2" onclick="window.location='/'">Cancelar</button>
        <div class="form-group col-md-3">
    </div>
</form>
