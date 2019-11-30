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


        $dataPoints = array(
            array("label" => "Viaje y Equipo 1", "y" => $vuelo['pasajes']),
            array("label" => "Viaje y Equipo", "y" => $vuelo['capacidad'])
        );
    }

    echo $vuelos[0]['porcentaje'];

    ?>

    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                title:{
                    text: "Average Expense Per Day  in Thai Baht"
                },
                subtitles: [{
                    text: "Currency Used: Thai Baht (฿)"
                }],
                data: [{
                    type: "pie",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - #percent%",
                    yValueFormatString: "฿#,##0",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>

    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>