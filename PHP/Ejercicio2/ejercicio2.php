<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Ejercicio 2 Include</title>
</head>
<body>
    <h2> Se utiliza la función include() que ubica el codigo php definido en el archivo ejercicio2.inc </h2>
    <h2> A continuacion se intentan mostrar las variables $aUno y $aDos antes del Include: </h2>
    <br/>
    <table style="background-color:lightblue; border-style:double;">
        <thead>
            <tr>
                <td>
                    Nombre
                </td>
                <td>
                    Apellido
                </td>
                <td>
                    Anio de Nacimiento
                </td>
            </tr>
        </thead>

        <tbody>
            <?php 
                echo "<tr>";
                echo "<td>". $varUno['nombre'] . "</td>";
                echo "<td>". $varUno['apellido'] . "</td>";
                echo "<td>". $varUno['anio'] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>". $varDos['nombre'] . "</td>";
                echo "<td>". $varDos['apellido'] . "</td>";
                echo "<td>". $varDos['anio'] . "</td>";
                echo "</tr>";
            ?>
        </tbody>
    </table>
    
    <?php
        echo "<h3> Longitud del arreglo \$varUno: 0</h3>";
        echo "<h3> Longitud del arreglo \$varDos: 0</h3>";

        include("./ejercicio2.inc");
        echo "<h3> Se ejecuta la funci&oacute;n include(); </h3> </br></br>"; 
    ?>
    <table style="background-color:lightblue; border-style:double;">
        <thead>
            <tr>
                <td>
                    Nombre
                </td>
                <td>
                    Apellido
                </td>
                <td>
                    Anio de Nacimiento
                </td>
            </tr>
        </thead>

        <tbody>
            <?php 
                include("./ejercicio2.inc");
                echo "<tr>";
                echo "<td>". $varUno['nombre'] . "</td>";
                echo "<td>". $varUno['apellido'] . "</td>";
                echo "<td>". $varUno['anio'] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>". $varDos['nombre'] . "</td>";
                echo "<td>". $varDos['apellido'] . "</td>";
                echo "<td>". $varDos['anio'] . "</td>";
                echo "</tr>";
            ?>
        </tbody>
    </table>

    <?php
        echo "<h3> Longitud del arreglo \$varUno: " . count($varUno) . "</h3>";
        echo "<h3> Longitud del arreglo \$varDos: " . count($varDos) . "</h3>";
    ?>

</body>
</html>