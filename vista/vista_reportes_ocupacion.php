<h2>Reportes de Ocupacion</h2>


<h4>Por Viaje y Equipo</h4>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Vuelo</th>
        <th scope="col">Cabina</th>
        <th scope="col">Cantidad de Pasajes</th>
        <th scope="col">Capacidad</th>
        <th scope="col">Porcentaje de Ocupacion</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $vuelos = getReporteTasaDeOcupacion();

    foreach ($vuelos as $vuelo) {
        echo "
        <tr>
            
            <td>" . $vuelo['vuelo'] . "</td>
            <td>" . $vuelo['cabina'] . "</td>
            <td>" . $vuelo['pasajes'] . "</td>
            <td>" . $vuelo['capacidad'] . "</td>
            <td>" . $vuelo['porcentaje'] . "</td>
        </tr>";
    }

    $dataPointGeneral = array();
    $dataPointFamiliar = array();
    $dataPointSuit = array();
    $generales = getReporteTasaDeOcupacionGafrico("General");
    foreach ($generales as $general){
        array_push($dataPointGeneral, $general);
    }

    $familiares = getReporteTasaDeOcupacionGafrico("Familiar");
    foreach ($familiares as $familiar){
        array_push($dataPointFamiliar, $familiar);
    }

    $suits = getReporteTasaDeOcupacionGafrico("Suit");
    foreach ($suits as $suit){
        array_push($dataPointSuit, $suit);
    }

    ?>
    </tbody>
</table>

    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: "Average Amount Spent on Real and Artificial X-Mas Trees in U.S."
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
                    yValueFormatString: "#0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPointGeneral, JSON_NUMERIC_CHECK); ?>
                },{
                    type: "column",
                    name: "Familiar",
                    indexLabel: "{y}",
                    yValueFormatString: "#0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPointFamiliar, JSON_NUMERIC_CHECK); ?>
                },{
                    type: "column",
                    name: "Suit",
                    indexLabel: "{y}",
                    yValueFormatString: "#0.##",
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