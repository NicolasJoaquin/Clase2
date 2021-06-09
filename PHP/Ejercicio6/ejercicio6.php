<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Ejercicio 6 Formulario Encriptado</title>
    <style>
        * {
        }

        body, html {
            height: 100%;
            width: 100%;
            margin: auto;
        }

        #general {
            height: 100%;
            width: 100%;
            box-sizing: border-box;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: cornflowerblue;
        }
    </style>
</head>
<body>
    <div id="general">
        <?php
            if (isset($_POST['pass'])) {
                $clave = $_POST['pass'];
                $claveMD5 = md5($clave);
                $claveSHA1 = sha1($clave);
                echo"<h2>Respuesta a Formulario Encriptado:</h2>";
                echo"Clave: " . $clave . "<br/>";
                echo"Clave Encriptada en MD5: " . $claveMD5 . "<br/>";
                echo"Clave Encriptada en SHA1: " . $claveSHA1 . "<br/>";
                echo "<a href='./ejercicio6.html'>Volver</a>";
            }
            else {
                echo"
                    <h2>Formulario Encriptado:</h2>
                    <form action='./ejercicio6.php' method='post'>
                        <label for='clave'>Ingrese la clave a encriptar:</label><br />
                        <input type='text' id='clave' name='pass' /><br />

                        <button type='submit'>Obtener Encriptaci&oacute;n</button>
                    </form>
                ";
            }
        ?>
        
    </div>
</body>
</html>