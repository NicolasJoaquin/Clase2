<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <style>
        #titGeneral{
            margin: auto;
            font-size:25px;
            font-style:italic;
            border-style:double;
        }

    </style>
</head>
<body>
    <h1 id="titGeneral">Ejercicio 1 PHP</h1>

    <h3> Texto fuera de los bloques de apertura y cierre de c&oacute;digo php </h3>
    <?= "<p>Texto dentro de un bloque de <span style='color:blue'>c&oacute;digo</span> php<p>"; ?>
    
    <?php $miVariable = "ValorDeVariable" ; ?>
    <?= "Sin usar concatenador <span style='color:blue'> \$miVariable </span>: $miVariable "; ?> <br/>
    <?= "Usando concatenador <span style='color:blue'> \$miVariable </span>: " . $miVariable ; ?><br/>

    <?php $miVariable = true ; ?><br/>
    <?= "Variable tipo booleana o l&oacute;gica con valor verdadero: <span style='color:blue'>\$miVariable</span> : $miVariable" ; ?><br/>
    <?php $miVariable = false ; ?>
    <?= "Variable tipo booleana o l&oacute;gica con valor falso: <span style='color:blue'>\$miVariable</span> : $miVariable" ; ?><br/><br/>

    <?php define("VARIABLECONSTANTE", "ValorConst"); ?> 
    <?= "<span style='color:blue'> VARIABLECONSTANTE </span> : VARIABLECONSTANTE"; ?><br/>
    <?= "Tipo de <span style='color:blue'> VARIABLECONSTANTE </span> : " . gettype(VARIABLECONSTANTE); ?><br/><br/>

    <h1> Arreglos </h1>
    <?php $aPalabra = ["hola","hello"]?>
    <?= "<span style='color:blue'>\$aPalabra[0]</span> : $aPalabra[0]"; ?> <br/>
    <?= "<span style='color:blue'>\$aPalabra[1]</span> : $aPalabra[1]"; ?> <br/>
    <?= "Tipo de <span style='color:blue'>\$aPalabra</span> : array"; ?> <br/>
    <br/><p>Se agregan por programa 2 valores mas al array</p>
    <?php   array_push($aPalabra,"ciao");
            array_push($aPalabra,"hallo");
    ?>
    <br/><h3>Elementos originales y agregados</h3>
    <ul>
        <li><?= "$aPalabra[0]"; ?></li>
        <li><?= "$aPalabra[1]"; ?></li>
        <li><?= "$aPalabra[2]"; ?></li>
        <li><?= "$aPalabra[3]"; ?></li>
    </ul>

    <br/> <h3> Arreglo de dos dimensiones (Diccionario) </h3>

    <?php   
        $aPalabra2 = [];
        array_push($aPalabra2,"adios");
        array_push($aPalabra2,"bye");
        array_push($aPalabra2,"addio");
        array_push($aPalabra2,"tschuss");

        $aPalabra3 = [];
        array_push($aPalabra3,"casa");
        array_push($aPalabra3,"house");
        array_push($aPalabra3,"addio");
        array_push($aPalabra3,"zuhause");

        $aDiccionarioBasico = [];
        array_push($aDiccionarioBasico,$aPalabra);
        array_push($aDiccionarioBasico,$aPalabra2);
        array_push($aDiccionarioBasico,$aPalabra3);

        foreach($aDiccionarioBasico as $varNombrePersona) {
            foreach($varNombrePersona as $var){
                echo "<h4>" . $var . "</h4>";
            }
        }

    ?>

    <table style="background-color:lightblue; border-style:solid;">
        <thead>
            <tr>
                <td>
                    Espaniol
                </td>
                <td>
                    Ingles
                </td>
                <td>
                    Italiano
                </td>
                <td>
                    Aleman
                </td>
            </tr>
        </thead>

        <tbody>
            <?php 
                for($i = 0 ; $i<3 ; $i++){
                    echo"<tr>";
                    for($b = 0 ; $b<4 ; $b++){
                        echo "<td>" . $aDiccionarioBasico[$i][$b] . "</td>";
                    }
                    echo"</tr>";
                }
            ?>
        </tbody>
    </table>

    <br/><h3> <?= "\$aDiccionarioBasico[1][3] : " . $aDiccionarioBasico[1][3]; ?> </h3>
    <br/><br/>

    <h2> Variables tipo arreglo Asociativo </h2><br/>
    <?php
        $renglonArticulos = ["cod"=>"E1R3","desc"=> "Porotos en Lata" , "precio"=>80,"cant"=>30];
        echo "Codigo: " . $renglonArticulos['cod'] . "<br/>";
        echo "Descripcion: " . $renglonArticulos['desc'] . "<br/>";
        echo "Precio: " . $renglonArticulos['precio'] . "<br/>";
        echo "Cantidad: " . $renglonArticulos['cant'] . "<br/>";
    ?>
    <br/>
    Cantidad de elementos: <?= count($renglonArticulos); ?> <br/>
    Tipo de dato: <?= gettype($renglonArticulos); ?> <br/> <br/>

    <h2>Expresiones aritmeticas</h2><br/>
    <?php 
        $numUno = 5;
        $numDos = 4;
    ?>
    <h4> Se declara variable <?= "\$numUno = " . $numUno ;?>  </h4>
    <h4> Se declara variable <?= "\$numDos = " . $numDos ;?>  </h4>
    <h4> Tipo de <?= "\$numUno = " . gettype($numUno);?>  </h4>
    <h4> Tipo de <?= "\$numDos = " . gettype($numDos);?>  </h4>
    <h4> SUMA: <?= "\$numUno + \$numDos = " . ($numUno + $numDos);?>  </h4>
    <h4> MULTIPLICACION: <?= "\$numUno * \$numDos = " . ($numUno * $numDos);?>  </h4>
    <h4> DIVISION: <?= "\$numUno / \$numDos = " . ($numUno / $numDos);?>  </h4>

</body>
</html>