<?php
	session_start();

	if(!isset($_SESSION['usuario'])) {
		header('location:./FormularioDeLogin.html');
		exit();	
	}

    $usuario = $_SESSION['usuario'];
    $id = $_SESSION['ID'];
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Menu</title>
    <style>
    #opciones {
            width: 50%;
            height: 72%;
            /*border-style: solid;*/
            border-radius: 20px;
            background-color: lightgray;
            padding: 2%;
            position: fixed;
            margin-top: 5%;
            margin-left: 25%;
    }

    #headerOpciones{
            width: 96%;
            height: 12%;
            margin-bottom: 3%;
            border-radius: 20px;
            display: flex;
            font-size:20px;
            justify-content: center;
            align-items: center;
            background-color: grey;
            padding-right: 3%;
        }
    </style>
</head>
<body>
    <div id="opciones">
        <div id="headerOpciones">
            <span>Datos y Opciones</span>
        </div>
        <div id="cuerpoRespuesta">
            <h3>Bienvenido: <?php echo $usuario ?></h3>
            <h5>Su ID es: <?php echo $id ?></h5>
            <h5>El contador de sesiones ingresadas es de: </h5>
            <br/>

	        <p><button id="ejercicio" onClick=\"location.href='./ejercicio9.php'\">Ingrese a la aplicaci&oacute;n</button><p>
	        <p><button id="finalizar" onClick=\"location.href='./DestruirSesion.php'\">Terminar sesi&oacute;n</button><p>

        </div>
    </div>

    <script>
        
        $(document).ready(function () {
            $("#ejercicio").click(function () {
                window.location.href = './ejercicio9.php';
            });

            $("#finalizar").click(function () {
                window.location.href = './DestruirSesion.php';
            });
        });

    </script>
</body>
</html>