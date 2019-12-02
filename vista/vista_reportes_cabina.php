<h2>Reporte de Cabina más vendida</h2>


    <?php

    $cabinaMasVendida = getCabinaMasVendida();


    $cabinas = getCabinasVendidas();

    $data = array();

    foreach ($cabinas as $cabina) {

        array_push($data, $cabina);
    }

    ?>

<script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            title: {
                text: ""
            },
            subtitles: [{
                text: ""
            }],
            data: [{
                type: "pie",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - #percent%",
                yValueFormatString: "#,##0",
                dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>

<button id="exportButton" class="btn btn-primary float-right">Exportar PDF</button>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
    setTimeout(function(){
        var canvas = $("#chartContainer .canvasjs-chart-canvas").get(0);
        var dataURL = canvas.toDataURL("image/jpeg");


        $("#exportButton").click(function(){
            var pdf = new jsPDF({orientation: 'landscape'});
            var width = pdf.internal.pageSize.getWidth();
            var height = pdf.internal.pageSize.getHeight();
            const imgProps= pdf.getImageProperties(dataURL);
            const pdfHeight = (imgProps.height * width) / imgProps.width;
            pdf.addImage(dataURL, 'JPEG', 0, 0, width-10, pdfHeight);
            pdf.save("reporte-cabina.pdf");
        });
    },0);
</script>