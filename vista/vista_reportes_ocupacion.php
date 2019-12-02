    <?php

    $dataPointGeneral = array();

    $dataPointFamiliar = array();

    $dataPointSuite = array();

    $generales = getReporteTasaDeOcupacionGrafico("General");
    foreach ($generales as $general){
        array_push($dataPointGeneral, $general);
    }

    $familiares = getReporteTasaDeOcupacionGrafico("Familiar");
    foreach ($familiares as $familiar){
        array_push($dataPointFamiliar, $familiar);
    }

    $suites = getReporteTasaDeOcupacionGrafico("Suite");
    foreach ($suites as $suite){
        array_push($dataPointSuite, $suite);
    }

    ?>

    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: "Reportes de ocupación de cabina por viaje y equipo"
                },
                legend:{
                    cursor: "pointer",
                    verticalAlign: "center",
                    horizontalAlign: "right",
                    itemclick: toggleDataSeries
                },
                data: [{
                    type: "column",
                    name: "General",
                    indexLabel: "Vuelo: {y}",
                    yValueFormatString: "##0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPointGeneral, JSON_NUMERIC_CHECK); ?>
                },{
                    type: "column",
                    name: "Familiar",
                    indexLabel: "Vuelo: {y}",
                    yValueFormatString: "##0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPointFamiliar, JSON_NUMERIC_CHECK); ?>
                },{
                    type: "column",
                    name: "Suite",
                    indexLabel: "Vuelo: {y}",
                    yValueFormatString: "##0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPointSuite, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

            function toggleDataSeries(e){
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else{
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

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
                pdf.save("reporte-ocupacion.pdf");
            });
            },1000);
    </script>
<div class="mb-5 mt-5"></div>