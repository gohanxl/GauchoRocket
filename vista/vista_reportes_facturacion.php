<h2>Reportes de Facturacion</h2>


<h4>Mensual</h4>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Año</th>
        <th scope="col">Mes</th>
        <th scope="col">Facturacion</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $facturacionMensual = getFacturacionMensual();

    foreach ($facturacionMensual as $f_mensual) {
        echo "
        <tr>
            <td>" . $f_mensual['año'] . "</td>
            <td>" . $f_mensual['mes'] . "</td>
            <td>" . $f_mensual['facturacion'] . "</td>
        </tr>";


        $dataPoints = array(
            array("label" => "Facturacion", "y" => $f_mensual['facturacion']),
            array("label" => "Facturacion", "y" => $f_mensual['facturacion']),
        );
    }

    ?>
    </tbody>
</table>
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