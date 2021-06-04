<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Ejercicio 4 Variables Objeto</title>
    <style>
    td{
         border: solid;
         border-collapse: collapse;
    }
    </style>
</head>
<body>
    <h1>Variables de tipo Objeto en PHP, Variable Objeto Renglon de Pedido</h2>
    <h2><span style='color:blue'>$objetoRenglonPedido</span></h2><br/><br/>
    <?php
        $objetoRenglonPedido = new stdclass; 
        $objetoRenglonPedido->codArt = "E1K3";
        $objetoRenglonPedido->precioUnitario=750;
        $objetoRenglonPedido->cantidad=70;
        $objetoRenglonPedido->desc="Licor Mariposa";

        echo "Codigo de articulo: " . $objetoRenglonPedido->codArt . "<br/>";
        echo "Precio de articulo: " . $objetoRenglonPedido->precioUnitario . "<br/>";
        echo "Cantidad de articulo: " . $objetoRenglonPedido->cantidad . "<br/>";
        echo "Descripcion de articulo: " . $objetoRenglonPedido->desc . "<br/>";
    ?>

    <h2>Tipo de <span style='color:blue'>$objetoRenglonPedido</span>: <?= gettype($objetoRenglonPedido) ?> </h2>
    <br/><br/>
    <h2>Se define un arreglo de pedidos llamado <span style='color:blue'>$aRenglones</span></h2>
    <?php 
        $objetoRenglonPedido2 = new stdclass; 
        $objetoRenglonPedido2->codArt = "AB34";
        $objetoRenglonPedido2->precioUnitario=1350;
        $objetoRenglonPedido2->cantidad=55;
        $objetoRenglonPedido2->desc="Licor Sheridan's";
        $aRenglones = [];
        array_push($aRenglones,$objetoRenglonPedido);
        array_push($aRenglones,$objetoRenglonPedido2);
    ?>

    <table style="background-color:lightgray; border-style:double;">
        <tbody>
            <?php
                foreach($aRenglones as $var){
                    echo "<tr> <td>" . $var->codArt . "</td> <td>" . $var->precioUnitario . "</td> <td>" . $var->cantidad . "</td> <td>" . $var->desc . "</td>";
                }
           ?>
        </tbody>
    </table> <br/>
    <h4> Cantidad de renglones de <span style='color:blue'>$aRenglones</span>: <?= count($aRenglones); ?> <br/><br/>
    <h2>Se crea el objeto <span style='color:blue'>$objetoRenglones</span> que contiene un arreglo de renglones y la cantidad de los mismos </h2>
    <?php
        $objetoRenglones = new stdclass;
        $objetoRenglones->renglones = $aRenglones;
        $objetoRenglones->cantidad = count($aRenglones);
    ?><br/>
    <table style="background-color:lightgray; border-style:double;">
        <tbody>
            <?php
                foreach($objetoRenglones->renglones as $var){
                    echo "<tr> <td>" . $var->codArt . "</td> <td>" . $var->precioUnitario . "</td> <td>" . $var->cantidad . "</td> <td>" . $var->desc . "</td>";
                }
           ?>
        </tbody>
    </table> <br/>
    <h4> Cantidad de renglones de <span style='color:blue'>$objetoRenglones</span>: <?= $objetoRenglones->cantidad; ?> <br/><br/>

    <h2>Se crea un JSON <span style='color:blue'>$jsonRenglones</span> y se muestra a continuaci&oacute;n:</h2>
    <?php
        $jsonRenglones= json_encode($objetoRenglones);
        echo $jsonRenglones;
    ?>
</body>
</html>
