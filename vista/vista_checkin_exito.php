<?php

if(isset($_POST['submit'])){
    $pasajeId = $_POST['pasaje'];
    $asiento = $_POST['asiento'];

    date_default_timezone_set("America/Argentina/Buenos_Aires");
    checkinPasaje($pasajeId, date("Y-m-d H:i:s"), $asiento);

}


?>

<script>
    var doc = new jsPDF(landscape);
    var imgData = 'data:image/jpeg;base64,'+ Base64.encode("/public/img/rocket.png");
    doc.setFontSize(22);
    doc.text(20, 20, 'GauchoRocket');
    doc.setFontSize(16);
    doc.text(20, 20, 'This is a title');
    
</script>

