<?php

include_once("helpers/phpqrcode/qrlib.php");

if(isset($_POST['submit'])){
    $pasajeId = $_POST['pasaje'];
    $asiento = $_POST['asiento'];
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    checkinPasaje($pasajeId, date("Y-m-d H:i:s"), $asiento);
    $pasaje = getPasajesById($pasajeId)[0];
    $cliente = getClienteNombre($pasaje['cliente']);
    $origen = getLocacionDescripcion($pasaje['origen']);
    $destino = getLocacionDescripcion($pasaje['destino']);
    $cabina = getCabinaDescripcion($pasaje['cabina']);
    $partida = getPartidaByVueloId($pasaje['vuelo']);
    $hora = getHoraByVueloId($pasaje['vuelo']);
}


?>



<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">CHECK-IN EXITOSO</h1>
        <p class="lead">Gracias por viajar con nosotros. Su boleto esta siendo descargado.</p>
    </div>
</div>

<div id="qrcode"></div>
<script type="text/javascript">
    new QRCode(document.getElementById("qrcode"), "https://github.com/gohanxl/GauchoRocket");
</script>

<script>
    setTimeout(function() {
        var doc = new jsPDF('landscape','mm', [300, 500]);
        doc.setFontSize(22);
        doc.text(20, 20, 'Gauchorocket');
        doc.setFontSize(16);
        doc.text(20, 30, 'Código: <?php echo $pasaje['codigo']?>');
        doc.text(20, 40, 'Pasajero: <?php echo $cliente ?>');
        doc.text(20, 50, 'Origen:  <?php echo $origen?>');
        doc.text(80, 50, 'Destino:  <?php echo $destino?>');
        doc.text(20, 60, 'Cabina:  <?php echo $cabina?>');
        doc.text(20, 70, 'Asiento:  <?php echo $pasaje['asiento']?>');
        doc.text(20, 80, 'Partida: <?php echo $partida?>');
        doc.text(80, 80, 'Hora: <?php echo $hora?>');
        //doc.addImage("/public/img/rocket.png", 'PNG', 0, 0, 20, 0);
        doc.save("pasaje.pdf");
    }, 3000);
</script>