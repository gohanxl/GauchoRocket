<h2>Reportes de Cabina</h2>


<h4>Más vendida</h4>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Cantidad Vendidas</th>
        <th scope="col">Tipo de Cabina</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $cabinaMasVendida = getCabinaMasVendida();

    /*
    echo "
        <tr>
            <td>" . $cabinaMasVendida['cantidad'] . "</td>
            <td>" . $cabinaMasVendida['descripcion'] . "</td>
        </tr>";
*/

    $cabinas = getCabinasVendidas();

    $data = array();

    foreach ($cabinas as $cabina) {

        array_push($data, $cabina);
    }

    ?>
    </tbody>
</table>

<script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            title: {
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
                yValueFormatString: "#,##0",
                dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>