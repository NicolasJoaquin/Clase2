<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Ejercicio 3 Variables</title>
    <style>
        td{
            border: solid;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h2>Variables del Servidor</h2>
    <table style="background-color:lightgray; border-style:double;">
        <tbody>
           <tr>
                <td>
                    <?= "SERVER_ADDR"; ?>
                </td>
                <td>
                    <?= $_SERVER['SERVER_ADDR']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= "SERVER_PORT"; ?>
                </td>
                <td>
                    <?= $_SERVER['SERVER_PORT']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= "SERVER_NAME"; ?>
                </td>
                <td>
                    <?= $_SERVER['SERVER_NAME']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= "DOCUMENT_ROOT"; ?>
                </td>
                <td>
                    <?= $_SERVER['DOCUMENT_ROOT']; ?>
                </td>
            </tr>
        </tbody>
    </table> <br/><br/>

    <h2>Variables del Cliente</h2>
    <table style="background-color:lightgray; border-style:double;">
        <tbody>
           <tr>
                <td>
                    <?= "REMOTE_ADDR"; ?>
                </td>
                <td>
                    <?= $_SERVER['REMOTE_ADDR']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= "REMOTE_PORT"; ?>
                </td>
                <td>
                    <?= $_SERVER['REMOTE_PORT']; ?>
                </td>
        </tbody>
    </table> <br/><br/>

    <h2>Variables de Requerimiento</h2>
    <table style="background-color:lightgray; border-style:double;">
        <tbody>
           <tr>
                <td>
                    <?= "SCRIPT_NAME"; ?>
                </td>
                <td>
                    <?= $_SERVER['SCRIPT_NAME']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= "REQUEST_METHOD"; ?>
                </td>
                <td>
                    <?= $_SERVER['REQUEST_METHOD']; ?>
                </td>
        </tbody>
    </table> <br/><br/>

    <h2>Todas las Variables</h2>
    <table style="background-color:lightgray; border-style:double;">
        <tbody>
            <?php
                foreach($_SERVER as $key_name => $key_value){
                    echo "<tr> <td>" . $key_name . "</td>   <td>" . $key_value . "</td> </tr>";
                }
            ?>
        </tbody>
    </table> <br/><br/>
</body>
</html>