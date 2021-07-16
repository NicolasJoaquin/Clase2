<?php

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
    }//ESTO PUEDE IR EN UN IF, SI ES FALSE ES PORQUE LA
    //CONXION NO SE PUEDE DAR Y SE PODRIA ARCHIVAR EL ERROR EN UN ARCHIVO DE .LOG, ACA SE CARGA EL OBJETO
    // QUE CONTIENE LA CONEXION CON LA BASE DE DATOS
    $id = $_POST['ID']; 

    if($id == "baja"){      //BAJA DE ARTICULO
        $codArt = $_POST['codArt'];
        $sql = "delete from articulos where codArt='$codArt';";

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
        }else{
            $mysqli->close();
            echo "Se ha dado de baja con exito el articulo: " . $codArt;
        }
    }

    if($id == "alta"){      // ALTA DE ARTICULO
        if( !$sentencia = $mysqli->prepare("insert into articulos (codArt,familia,descripcion,um,fechaAlta,saldoStock) 
        values (?,?,?,?,?,?)") ){
            $respuesta = $respuesta . "<br />Falló la preparación del template: (" . $mysqli->errno . ") " . $mysqli->error;
            $puntero = fopen("./errores.log","a");
            fwrite($puntero, $respuesta);
            fwrite($puntero, "\n");
            fclose($puntero);
            die();
        }else{
            $codArt = $_POST['codArt'];
            $familia = $_POST['familia'];
            $descripcion = $_POST['descripcion'];
            $um = $_POST['um'];
            $fechaAlta = $_POST['fechaAlta'];
            $saldoStock = $_POST['saldoStock'];
            
            if( !$sentencia->bind_param('sssssi', $codArt, $familia, $descripcion, $um, $fechaAlta, $saldoStock) ){
                $respuesta = $respuesta . "<br />Falló la vinculación de parámetros simples: (" . $sentencia->errno . ") " . $sentencia->error;
                $puntero = fopen("./errores.log","a");
                fwrite($puntero, $respuesta);
                fwrite($puntero, "\n");
                fclose($puntero);
                die();
            }else{
                if( !$sentencia->execute() ){
                    //$respuesta = $respuesta . "<br />Falló la ejecución de parametros simples: (" . $sentencia->errno . ") " . $sentencia->error;
                    $puntero = fopen("./errores.log","a");
                    fwrite($puntero, "fallo en la ejecucion del alta");
                    fwrite($puntero, "\n");
                    fclose($puntero);
                    die();
                }else{
                    //$respuesta = $respuesta . "<br />Se ha cargado con exito el nuevo articulo!";
                    $puntero = fopen("./errores.log","a");
                    fwrite($puntero, "Se ejecuto con exito la query del alta");
                    fwrite($puntero, "\n");
                    fclose($puntero);
                    //$resultado = $sentencia->get_result();
                    $mysqli->close();
                    echo "Se ha cargado con exito el nuevo articulo: " . $codArt;
                }
            }
        }
    }

    if($id == "llenaLista"){    //FUNCION PARA LLENAR LISTA DE FAMILIAS
        $sql = "SELECT * FROM familias";
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
        $familias=[];

        while($fila=$resultado->fetch_assoc()) {
            $objFamilia = new stdClass();
            $objFamilia->nombreFamilia=$fila['nombreFamilia'];

            array_push($familias,$objFamilia);
        }

        $objFamilias = new stdClass();
        $objFamilias->familias=$familias;

        $salidaJson = json_encode($objFamilias);
        $mysqli->close();

        echo $salidaJson;
    }

    if($id == "modificar"){     //MODIFICAR
        if( !$sentencia = $mysqli->prepare("update articulos set codArt=?,familia=?,descripcion=?,um=?,fechaAlta=?,saldoStock=? where codArt=?;") ){
            $respuesta = $respuesta . "<br />Falló la preparación del template MODI: (" . $mysqli->errno . ") " . $mysqli->error;
            $puntero = fopen("./errores.log","a");
            fwrite($puntero, $respuesta);
            fwrite($puntero, "\n");
            fclose($puntero);
            die();
        }else{
            $codArt = $_POST['codArt'];
            $familia = $_POST['familia'];
            $descripcion = $_POST['descripcion'];
            $um = $_POST['um'];
            $fechaAlta = $_POST['fechaAlta'];
            $saldoStock = $_POST['saldoStock'];
            
            if( !$sentencia->bind_param('sssssis', $codArt,$familia,$descripcion,$um,$fechaAlta,$saldoStock,$codArt) ){
                $respuesta = $respuesta . "<br />Falló la vinculación de parámetros simples MODI: (" . $sentencia->errno . ") " . $sentencia->error;
                $puntero = fopen("./errores.log","a");
                fwrite($puntero, $respuesta);
                fwrite($puntero, "\n");
                fclose($puntero);
                die();
            }else{
                if( !$sentencia->execute() ){
                    $respuesta = $respuesta . "<br />Falló la ejecución de parametros simples MODI: (" . $sentencia->errno . ") " . $sentencia->error;
                    fwrite($puntero, $respuesta);
                    fwrite($puntero, "\n");
                    fclose($puntero);
                    die();
                }else{
                    $respuesta ="<br />Se ha hecho con exito el update del articulo!";
                    $puntero = fopen("./errores.log","a");
                    fwrite($puntero, $respuesta);
                    fwrite($puntero, "\n");
                    fclose($puntero);
                    $resultado = $sentencia->get_result();
                    $mysqli->close();
                    echo "Se ha hecho con exito el update del articulo: " . $codArt;
                }
            }
        }
    }

    if($id == "completaFormModi"){  // COMPLETAR FORMULARIO DE MODIFICACION
        $codArt = $_POST['codArt'];
        $sql = "SELECT * FROM articulos WHERE codArt = '$codArt' LIMIT 1";

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
        }else{
            $fila=$resultado->fetch_assoc();
            $objArticulo = new stdClass();
            $objArticulo->codArt=$fila['codArt'];
            $objArticulo->familia=$fila['familia'];
            $objArticulo->um=$fila['um'];
            $objArticulo->descripcion=$fila['descripcion'];
            $objArticulo->fechaAlta=$fila['fechaAlta'];
            $objArticulo->saldoStock=$fila['saldoStock'];
            $salidaJson = json_encode($objArticulo);

            $mysqli->close();
            echo $salidaJson;
        }
    }
    
    if($id == "ordenaryfiltrar"){   //ORDENAR Y FILTRAR
        
        $sql="select * from articulos where ";
        $sql=$sql . "codArt LIKE ? and ";
        $sql=$sql . "familia LIKE ? and ";
        $sql=$sql . "um LIKE ? and ";
        $sql=$sql . "descripcion LIKE ? and ";
        $sql=$sql . "fechaAlta LIKE ?";
        //$sql=$sql . "saldoStock LIKE ?";
        
        if ( !($sentencia = $mysqli->prepare($sql)) ) {
            $respuesta = $respuesta . "<br />Falló la preparación del template: (" . $mysqli->errno . ") " . $mysqli->error;
            $puntero = fopen("./errores.log","a");
            fwrite($puntero, $respuesta);
            fwrite($puntero, "\n");
            fclose($puntero);
            die();
        }else{
            
            $filtroCodigo = $_POST['filtroCodigo'];
            $filtroFamilia = $_POST['filtroFamilia'];
            $filtroUm = $_POST['filtroUm'];
            $filtroDescripcion = $_POST['filtroDescripcion'];
            $filtroFechaAlta = $_POST['filtroFechaAlta'];
            //$filtroStock = $_POST['filtroStock'];
            

            $likeVarCodArt ="%" . $filtroCodigo . "%";
            $likeVarFamilia ="%" . $filtroFamilia . "%";
            $likeVarUm ="%" . $filtroUm . "%";
            $likeVarDescripcion ="%" . $filtroDescripcion . "%";
            $likeVarFechaAlta ="%" . $filtroFechaAlta . "%";
            //$likeVarStock ="%" . $filtroStock . "%";
            if ( !$sentencia->bind_param('sssss',$likeVarCodArt,$likeVarFamilia,$likeVarUm,$likeVarDescripcion,$likeVarFechaAlta) ) {
                $respuesta = $respuesta . "<br />Falló la vinculación de parámetros simples: (" . $sentencia->errno . ") " . $sentencia->error;
                $puntero = fopen("./errores.log","a");
                fwrite($puntero, $respuesta);
                fwrite($puntero, "\n");
                fclose($puntero);
                die();
            }else{
                if ( !$sentencia->execute() ) {
                    $respuesta = $respuesta . "<br />Falló la ejecución de parametros simples: (" . $sentencia->errno . ") " . $sentencia->error;
                    fwrite($puntero, $respuesta);
                    fwrite($puntero, "\n");
                    fclose($puntero);
                    die();
                }else{
                    $respuesta = $respuesta . "<br />Datos obtenidos!";
                    $puntero = fopen("./errores.log","a");
                    fwrite($puntero, $respuesta);
                    fwrite($puntero, "\n");
                    fclose($puntero);
                    $resultado = $sentencia->get_result();
                }
            }
        }

        $numeroDeRegistros = $resultado->num_rows;
        $articulos=[];

        while($fila=$resultado->fetch_assoc()) {
            $objArticulo = new stdClass();
            $objArticulo->codArt=$fila['codArt'];
            $objArticulo->familia=$fila['familia'];
            $objArticulo->um=$fila['um'];
            $objArticulo->descripcion=$fila['descripcion'];
            $objArticulo->fechaAlta=$fila['fechaAlta'];
            $objArticulo->saldoStock=$fila['saldoStock'];

            array_push($articulos,$objArticulo);
        }

        $objArticulos = new stdClass();
        $objArticulos->articulos=$articulos;
        $objArticulos->cuenta=$numeroDeRegistros;

        $salidaJson = json_encode($objArticulos);
        $mysqli->close();

        $puntero = fopen("./errores.log","a");
                    fwrite($puntero, $salidaJson);
                    fwrite($puntero, "\n");
                    fclose($puntero);

        echo $salidaJson;
    }

    if($id == "ordenar"){   //ORDENAR
        
        $orden = $_POST["orden"];
        //$sql="select * from articulos order by " . $orden;
        //$sql="select * from articulos order by codArt";
        $sql="select * from articulos order by " . $orden;
        if (!( $resultado = $mysqli->query($sql))) { //Devuelve un objeto $resultado
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

        $numeroDeRegistros = $resultado->num_rows;
        $articulos=[];

        while($fila=$resultado->fetch_assoc()) {
            $objArticulo = new stdClass();
            $objArticulo->codArt=$fila['codArt'];
            $objArticulo->familia=$fila['familia'];
            $objArticulo->um=$fila['um'];
            $objArticulo->descripcion=$fila['descripcion'];
            $objArticulo->fechaAlta=$fila['fechaAlta'];
            $objArticulo->saldoStock=$fila['saldoStock'];

            array_push($articulos,$objArticulo);
        }

        $objArticulos = new stdClass();
        $objArticulos->articulos=$articulos;
        $objArticulos->cuenta=$numeroDeRegistros;

        $salidaJson = json_encode($objArticulos);
        $mysqli->close();

        echo $salidaJson;
    
    }
    
    if($id == "cargar"){    //CARGAR
        $sql="select * from articulos";

        if (!( $resultado = $mysqli->query($sql))) { //Devuelve un objeto $resultado
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

        $numeroDeRegistros = $resultado->num_rows;
        $articulos=[];

        while($fila=$resultado->fetch_assoc()) {
            $objArticulo = new stdClass();
            $objArticulo->codArt=$fila['codArt'];
            $objArticulo->familia=$fila['familia'];
            $objArticulo->um=$fila['um'];
            $objArticulo->descripcion=$fila['descripcion'];
            $objArticulo->fechaAlta=$fila['fechaAlta'];
            $objArticulo->saldoStock=$fila['saldoStock'];

            array_push($articulos,$objArticulo);
        }

        $objArticulos = new stdClass();
        $objArticulos->articulos=$articulos;
        $objArticulos->cuenta=$numeroDeRegistros;

        $salidaJson = json_encode($objArticulos);
        $mysqli->close();

        echo $salidaJson;
    }

?>