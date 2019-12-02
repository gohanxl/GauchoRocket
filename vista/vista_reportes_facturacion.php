

    <?php

    $facturacionMensual = getFacturacionMensual();

    $data = array();

    foreach ($facturacionMensual as $f_mensual) {

        array_push($data, $f_mensual);

    }


    $facturacionCliente = getFacturacionCliente();

    $dataCliente = array();

    foreach($facturacionCliente as $f_cliente){
        array_push($dataCliente, $f_cliente);
    }


    ?>

<script>
    window.onload = function () {

        var chartMensual = new CanvasJS.Chart("chartContainerMensual", {
            animationEnabled: true,
            //theme: "light2",
            title:{
                text: "Reportes de facturación mensual"
            },
            axisX:{
                title: "Meses",
                crosshair: {
                    enabled: true,
                    snapToDataPoint: true
                }
            },
            axisY:{
                title: "En pesos ($)",
                crosshair: {
                    enabled: true,
                    snapToDataPoint: true
                }
            },
            toolTip:{
                enabled: false
            },
            data: [{
                type: "area",
                dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chartMensual.render();


        var chartCliente = new CanvasJS.Chart("chartContainerCliente", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Reportes de facturación por cliente"
            },
            data: [{
                type: "column", //change type to bar, line, area, pie, etc
                //indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($dataCliente, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chartCliente.render();

    }
</script>


<div id="chartContainerMensual" style="height: 370px; width: 100%;"></div>
<div class="mb-5">
    <button id="exportButtonMensual" class="btn btn-primary float-right">Exportar PDF</button>
</div>
<div id="chartContainerCliente" style="height: 370px; width: 100%;"></div>
<div class="mb-5">
<button id="exportButtonCliente" class="btn btn-primary float-right">Exportar PDF</button>
</div>
<div class="mt-5 mb-5">
    <hr>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
    setTimeout(function(){
        var canvas = $("#chartContainerMensual .canvasjs-chart-canvas").get(0);
        var dataURL = canvas.toDataURL("image/jpeg");


        $("#exportButtonMensual").click(function(){
            var pdf = new jsPDF({orientation: 'landscape'});
            var width = pdf.internal.pageSize.getWidth();
            var height = pdf.internal.pageSize.getHeight();
            const imgProps= pdf.getImageProperties(dataURL);
            const pdfHeight = (imgProps.height * width) / imgProps.width;
            pdf.addImage(dataURL, 'JPEG', 0, 0, width-10, pdfHeight);
            pdf.save("reporte-facturacion-mensual.pdf");
        });
    },1000);
</script>

    <script>
        setTimeout(function(){
            var canvas = $("#chartContainerCliente .canvasjs-chart-canvas").get(0);
            var dataURL = canvas.toDataURL("image/jpeg");


            $("#exportButtonCliente").click(function(){
                var pdf = new jsPDF({orientation: 'landscape'});
                var width = pdf.internal.pageSize.getWidth();
                var height = pdf.internal.pageSize.getHeight();
                const imgProps= pdf.getImageProperties(dataURL);
                const pdfHeight = (imgProps.height * width) / imgProps.width;
                pdf.addImage(dataURL, 'JPEG', 0, 0, width-10, pdfHeight);
                pdf.save("reporte-facturacion-cliente.pdf");
            });
        },1000);
    </script>