<form class="form mb-2" method="get" action="/vuelo/buscar">
    <div class="form-row">
        <div class="col-md-2 mb-2">
            <label for="inputTipo">Tipo de vuelo</label>
            <select id="inputTipo" class="form-control" name="tipo_vuelo">
                <option disabled selected value="">Elegir tipo...</option>
                <?php
                foreach ($tipos_vuelo as $tipo) {
                    echo "<option>" . $tipo['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="col-md-2 mb-2">
            <label for="inputTipo">Partida</label>
            <select id="inputTipo" class="form-control" name="origen">
                <option disabled selected value="">Elegir origen...</option>
                <?php
                foreach ($locaciones as $locacion) {
                    echo "<option>" . $locacion['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="col-md-2 mb-2">

            <label for="inputTipo">Destino</label>
            <select id="inputTipo" class="form-control" name="destino">
                <option selected disabled value="">Elegir destino...</option>
                <?php
                foreach ($locaciones as $locacion) {
                    echo "<option>" . $locacion['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <label for="partida">Ida</label>
            <input class="form-control mr-sm-2" value="" type="date" name="partida">
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
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Tipo vuelo</th>
        <th scope="col">Origen</th>
        <th scope="col">Destino</th>
        <th scope="col">Duracion</th>
        <th scope="col">Nave</th>
        <th scope="col">Partida</th>
        <th scope="col">Hora</th>
        <?php
        if( isset($_SESSION['logged']) and !is_null(getTipoCliente(getClienteId($_SESSION['user'])))){
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
            <td>" . getDescriptionTipoVuelo($vuelo['tipo_vuelo']) . "</td>
            <td>" . getLocacionDescripcion($vuelo['origen']) . "</td>
            <td>" . getLocacionDescripcion($vuelo['destino']) . "</td>
            <td>" . $vuelo['duracion'] . "</td>
            <td>" . getNaveDescripcion($vuelo['nave']) . "</td>
            <td>" . $vuelo['partida'] . "</td>
            <td>" . $vuelo['hora'] . "</td>";
            if(isset($_SESSION['logged']) and !is_null(getTipoCliente(getClienteId($_SESSION['user'])))){
                echo "
            <td>                
            <div class='row'>
                <div class='span6 mr-1'>
                ";
                date_default_timezone_set("America/Argentina/Buenos_Aires");
                $date_vuelo = strtotime($vuelo['partida'] . ' ' . $vuelo['hora']);
                if($date_vuelo - (60*60*24) < time()){
                    //Agregar boton en espera
                    echo"
                        <form class='form-inline mb-2' action='/pasaje/reserva' method='POST' enctype='multipart/form-data'>
                            <input type='hidden' name='vuelo' value=" . $vuelo['id'] . ">
                            <input type='hidden' name='espera' value='1'>
                            <button type='submit' class='btn btn-primary btn-sm name='comprar'>Espera</button>                   
                        </form>          
                    </div>
                </div>
                </td>";
                }
                /*elseif($date_vuelo - (60*60*2) < time() ){
                    //solo los que estan en espera pueden comprar
                    echo"
                        <form class='form-inline mb-2' action='/pasaje/reserva' method='POST' enctype='multipart/form-data'>
                            <input type='hidden' name='vuelo' value=" . $vuelo['id'] . ">
                            <button type='submit' class='btn btn-primary btn-sm name='comprar'>Comprar</button>                   
                        </form>          
                    </div>
                </div>
                </td>";
                }*/
                else{
                    echo"
                        <form class='form-inline mb-2' action='/pasaje/reserva' method='POST' enctype='multipart/form-data'>
                            <input type='hidden' name='vuelo' value=" . $vuelo['id'] . ">
                            <button type='submit' class='btn btn-primary btn-sm name='comprar'>Comprar</button>                   
                        </form>          
                    </div>
                </div>
                </td>";
            };
    echo "</tr>";}}
    echo "
    </tbody>
    </table>";
    ?>