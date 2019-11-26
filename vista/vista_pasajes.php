<h2>Pasajes</h2>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Fecha</th>
        <th scope="col">Origen</th>
        <th scope="col">Destino</th>
        <th scope="col">Estado</th>
        <th scope="col">Acción</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($pasajes as $pasaje){
        $partida = getPartidaByVueloId($pasaje['vuelo']);
        $estado = "Reserva";
        if($pasaje['checkin']){
            $estado = "Checkin";
        }elseif ($pasaje['compra']){
            $estado = "Compra";
        }
        echo "
        <tr>
            <th scope='row'>" . $pasaje['codigo'] . "</th>
            <td>" . $partida . "</td>
            <td>" . getLocacionDescripcion($pasaje['origen']) . "</td>
            <td>" . getLocacionDescripcion($pasaje['destino']) . "</td>
            <td>" . $estado . "</td>
            <td>";
        if($estado=="Reserva"){
        echo"
        <form class='form-inline mb-2' action='/pasaje/compra' method='POST' enctype='multipart/form-data'>
            <input type='hidden' name='pasaje' value=" . $pasaje['id'] . ">
            <button type='submit' class='btn btn-primary btn-sm name='comprar'>Comprar</button>                   
        </form>
        ";
        }
        elseif($estado=="Compra"){
            echo "        
            <form class='form-inline mb-2' action='' method='POST' enctype='multipart/form-data'>
                <input type='hidden' name='pasaje' value=" . $pasaje['id'] . ">
                <button type='submit' class='btn btn-primary btn-sm name='checkin'>Checkin</button>                   
            </form>
            ";
        }
        echo"
            </td>
        </tr>";
    }
    ?>
    </tbody>
</table>