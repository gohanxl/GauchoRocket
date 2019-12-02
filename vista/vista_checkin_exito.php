<?php

if(isset($_POST['submit'])){
    $pasajeId = $_POST['pasaje'];
    $asiento = $_POST['asiento'];

    date_default_timezone_set("America/Argentina/Buenos_Aires");
    checkinPasaje($pasajeId, date("Y-m-d H:i:s"), $asiento);

}


?>

<script>
    var doc = new jsPDF()
    
</script>

