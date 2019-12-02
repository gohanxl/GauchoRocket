<h2>Reportes de Ocupacion de cabina por viaje y equipo</h2>

    <?php


    $dataPointGeneral = array();
    $dataPointFamiliar = array();
    $dataPointSuit = array();
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
        array_push($dataPointSuit, $suite);
    }

    ?>

    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: ""
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
                    indexLabel: "{y}",
                    yValueFormatString: "##0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPointGeneral, JSON_NUMERIC_CHECK); ?>
                },{
                    type: "column",
                    name: "Familiar",
                    indexLabel: "{y}",
                    yValueFormatString: "##0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPointFamiliar, JSON_NUMERIC_CHECK); ?>
                },{
                    type: "column",
                    name: "Suite",
                    indexLabel: "{y}",
                    yValueFormatString: "##0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPointSuit, JSON_NUMERIC_CHECK); ?>
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div class="mb-5 mt-5"></div>