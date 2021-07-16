<?php
    /*session_start();
    if(!isset($_SESSION['usuario'])) {
		header('location:./FormularioDeLogin.html');
		exit();	
	}*/
    // RESCATO VARIABLES DEL FORMULARIO
    $usuario = $_POST['usuario'];
	$contrasenia = $_POST['pass'];

	
    $puntero = fopen("./errores.log","a");
            fwrite($puntero, "nombre: ");
            fwrite($puntero, $usuario);
            
            fwrite($puntero, "contrasenia: ");
            fwrite($puntero, $contrasenia);
            fclose($puntero);

    //ME CONECTO A LA BASE DE DATOS
	define("SERVER","bzcqhw1ncmfteo4vp0ag-mysql.services.clever-cloud.com");
    define("USUARIO","ulpnrfnwfz191zh1");
    define("PASS","yTD6Jb7pKTjltfcbXXuu");
    define("BASE","bzcqhw1ncmfteo4vp0ag");
    $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);
    if ($mysqli->connect_errno<>0) {
        $puntero = fopen("./errores.log","a");
        fwrite($puntero, "Fallo conexion base de datos: ");
        fwrite($puntero, $mysqli->connect_errno . " // ");
        $fecha = date("Y-m-d");
        fwrite($puntero, date("Y-m-d H-i") . " ");
        fwrite($puntero, "\n");
        fclose($puntero);
        die();
    }

    //ARMO CONSULTA SQL 
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and pass = '$contrasenia'";

    //VERIFICO QUE NO FALLE LA CONSULTA
    if( !$resultado = $mysqli->query($sql) ){
        if ($mysqli->connect_errno<>0) {
            $puntero = fopen("./errores.log","a");
            fwrite($puntero, "Fallo en la consulta: ");
            fwrite($puntero, $mysqli->connect_errno . " // ");
            $fecha = date("Y-m-d");
            fwrite($puntero, date("Y-m-d H-i") . " ");
            fwrite($puntero, "\n");
            fclose($puntero);
            die();
        }
    }

    // para contar las sesiones le agrego una columna a la tabla de la bd que me diga cuantas veces se con 

    //VERIFICO SI EXISTE O NO UNA FILA DEVUELTA EN LA CONSULTA PARA SABER SI USUARIO Y CONTRASENIA SON VALIDOS
    $filas = mysqli_num_rows($resultado);
    if($filas == 0){
        header('location:./FormularioDeLogin.html');
        exit();
    }
    $mysqli->close();


    //SI EXISTE CREO UN ID DE SESION Y SUMO EL contador
	session_start();
	$_SESSION['ID'] = session_id(); 
	$_SESSION['usuario']=$usuario;
    //$contador = $contador + 1;
    
    //LUEGO LO MANDO AL MENU DE LA APP
    header('location:./menu.php');

    
?>