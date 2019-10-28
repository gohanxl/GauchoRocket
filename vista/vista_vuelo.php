<form class="form mb-2" method="get" action="/vuelo/buscar">
    <div class="form-row">
        <div class="col-md-3 mb-2">
            <label for="inputTipo">Partida</label>
            <select id="inputTipo" class="form-control" name="origen" required>
                <option disabled selected value="">Elegir origen...</option>
                <?php
                foreach ($locaciones as $locacion) {
                    echo "<option>" . $locacion['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <label for="inputTipo">Destino</label>
            <select id="inputTipo" class="form-control" name="destino" required>
                <option selected disabled value="">Elegir destino...</option>
                <?php
                foreach ($locaciones as $locacion) {
                    echo "<option>" . $locacion['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="col-md-2 mb-2">
            <label for="partida">Ida</label>
            <input class="form-control mr-sm-2" type="date" name="partida" required>
        </div>
        <div class="col-md-2 mb-2">
            <label for="vuelta">Vuelta</label>
            <input class="form-control mr-sm-2" type="date" name="vuelta">
        </div>
        <div class="col-md-1 mb-2">
            <label for="submit" style="visibility: hidden;">buscar</label>
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
        <th scope="col">Hora</th>
        <?php
        if( isset($_SESSION['logged'])){
        echo "<th scope='col'></th>";
        };
        ?>
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
            <td>" . $vuelo['hora'] . "</td>";
            if(isset($_SESSION['logged'])){
                echo "
            <td>                
            <div class='row'>
                <div class='span6 mr-1'>
                    <form class='form-inline mb-2' action='/pasaje/reserva' method='POST' enctype='multipart/form-data'>
                        <input type='hidden' name='vuelo' value=" . $vuelo['id'] . ">
                        <button type='submit' class='btn btn-primary btn-sm name='comprar'>Comprar</button>                   
                    </form>          
                </div>
            </div>
            </td>";
            };
    echo "</tr>";}
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
                    <th scope=\"col\">Hora</th>
                    <th scope='col'></th>
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
                        <td>" . $vuelta['hora'] . "</td>";
            if($_SESSION['logged']){
                echo "
            <td>
            <div class='row'>
                <div class='span6 mr-1'>
                    <form class='form-inline mb-2' action='/pasaje/reserva' method='POST' enctype='multipart/form-data'>
                        <input type='hidden' name='vuelo' value=" . $vuelo['id'] . ">
                        <button type='submit' class='btn btn-primary btn-sm name='comprar'>Comprar</button>
                    </form>
                </div>
            </div>
            </td>";
            };
    echo "</tr>";}
    echo "
                </tbody>
                </table>";
    }
    ?>