<h2 class="mb-5" style="text-align:center;">Elección de asiento</h2>

<div class="row justify-content-md-center">
<div class="col-6">
    <form action="/checkin/exito" method="post">
<?php

    if(isset($_POST['pasaje'])){
        $pasajeId = $_POST['pasaje'];
        $cabina = getCabinaPasaje($pasajeId);
        $modelo = getModeloPasaje($pasajeId);
        $vuelo = getVueloPasaje($pasajeId);
        $capacidad = getCapacidadCabina($cabina, $modelo);
        if(!empty(getAsientos($cabina, $vuelo))){
            $asientos = getAsientos($cabina, $vuelo);
        }else{
            $asientos = 0;
        }

        $ocupados = array();
        foreach ($asientos as $asiento){
            array_push($ocupados, $asiento['asiento']);
        }


        echo '<table class="table-borderless" style="margin: auto;">';
        $fila = $capacidad / 10;
        $resto = $capacidad % 10;
        $i = 1;
        for($f=0;$f<$fila;$f++){
            echo '<tr>';
            if($f+1>$fila){
                for($c=0;$c<$resto;$c++){
                    if(in_array($i, $ocupados)){
                        echo '<td id=' . $i . ' style=\'color:red\'><i class="large material-icons">airline_seat_recline_normal</i></td>';
                    }else{
                        echo '<td id=' . $i . ' onClick=\'asiento_ocupado(this.id)\'><i class="large material-icons">airline_seat_recline_normal</i></td>';
                    }
                    $i++;
                };
            }else{
                for($c=0;$c<10;$c++){
                    if(in_array($i, $ocupados)){
                        echo '<td id=' . $i . ' style=\'color:red\'><i class="large material-icons">airline_seat_recline_normal</i></td>';
                    }else{
                        echo '<td id=' . $i . ' onClick=\'asiento_ocupado(this.id)\'><i class="large material-icons">airline_seat_recline_normal</i></td>';
                    }
                    $i++;
                };
            }

            echo '</tr>';
        }
        echo '</table>';
    }

?>
        <i class="medium material-icons ml-5 mt-2">airline_seat_recline_normal</i>Disponible
        <i class="medium material-icons" style="color:red;">airline_seat_recline_normal</i>Ocupado
        <i class="medium material-icons" style="color:#00e676;">airline_seat_recline_normal</i>Seleccionado
        <input type="hidden" id="pasaje" name="pasaje" value=" <?php echo $pasajeId; ?> ">
        <input type="hidden"  id="asiento" name="asiento" value="">
        <input type="submit" name="submit" class="btn btn-success float-right mr-4" value="Confirmar">
    </form>
    </div>
</div>

<style type="text/css">
    table td{
        min-width:50px;
        min-height:50px;
        text-align:center;
    }
</style>


<script type="text/javascript">
    function asiento_ocupado(clicked_id)
    {

        localStorage.setItem("last", localStorage.getItem("clicked"));
        localStorage.setItem("clicked", clicked_id);
        console.log(localStorage.getItem("clicked"));
        document.getElementById(localStorage.getItem("clicked")).style.color = '#00e676';
        document.getElementById(localStorage.getItem("last")).style.color = 'black';

        document.getElementById("asiento").value = localStorage.getItem("clicked");
    }
</script>