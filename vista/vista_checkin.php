<?php

?>


<html>
<head>
    <style type="text/css">
        table td{
            min-width:50px;
            min-height:50px;
            text-align:center;
        }
    </style>
</head>
<body>
<?php

$aSala=array('id_sala'=>1,'fila'=>5,'columna'=>5);
$aReservacion[]=array('id_reservacion'=>1,'id_sala'=>1,'cliente'=>'JUAN DIEGO ARI','butaca'=>'0:1');
$aReservacion[]=array('id_reservacion'=>7,'id_sala'=>1,'cliente'=>'ISAMAR MARTINEZ','butaca'=>'1:4');

function pComprobarReservacion($aReservacion,$butaca=""){
    $aDatosButaca=array();
    foreach($aReservacion as $row){
        if($row['butaca']==$butaca){
            $aDatosButaca=$row;break;
        }
    }
    return $aDatosButaca;
}


$fila=$aSala['fila'];$columna=$aSala['columna'];
echo '<table border="1" style="border-collapse:collapse;">';
for($f=0;$f<$fila;$f++){
    echo '<tr>';
    for($c=0;$c<$columna;$c++){
        $butaca_temp=$f.":".$c;
        $aDatosButaca=pComprobarReservacion($aReservacion,$butaca_temp);
        $estilo="";$titulo="";
        if(count($aDatosButaca)>0){
            $estilo='style="background-color:#F00"';
            $titulo='title="'.$aDatosButaca['cliente'].'"';
        }
        echo '<td '.$estilo.' '.$titulo.'>'.$butaca_temp.'</td>';
    }
    echo '</tr>';
}
echo '<table>';
?>
</body>
</html>
