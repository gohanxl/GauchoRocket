<?php
if(isset($_POST['pasaje']) && isset($_POST['cabina'])){
    $cantPasajes = $_POST['pasaje'];
    $cantidadTotalPasajes = $_POST['cabina'];

    if($cantPasajes < $cantidadTotalPasajes){
        $cantRestante = $cantidadTotalPasajes - $cantPasajes;
    }else{
        echo "Insuficientes pasajes para esa categoria";
    }
}

echo $cantRestante;
?>
<form action="" method="POST" enctype="application/x-www-form-urlencoded">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="destino">Tipo de Cabina</label>
            <input type="text" class="form-control" id="origen" name="origen"
                   value="<?php echo getTipoDeCabina($_POST['cabina'])?>"
                   disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="destino">Cantidad de Pasajes</label>
            <input type="text" class="form-control" id="destino" name="destino"
                   value="<?php echo $cantPasajes?>"
                   disabled>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Comprar</button>
    <button type="button" class="btn btn-secondary" onclick="window.location.replace('/')" name="cancel">Cancelar
    </button>
</form>

