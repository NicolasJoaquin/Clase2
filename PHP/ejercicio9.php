<?php
	session_start();

	if(!isset($_SESSION['usuario'])) {
		header('location:./FormularioDeLogin.html');
		exit();	
	}

	//MUESTRO APLICACION
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script src="scripts.js"></script>-->
    <title>Ejercicio 9 Lista</title>
    <style>
        body, html {
            height: 100%;
            width: 100%;
            margin: 0%;
            padding: 0%;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #titulo, #pie {
            margin-left: 40%;
            float: left;
        }

        #cargar, #vaciar, #alta {
            float: left;
            height: 50px;
            width: 120px;
        }

        #cargar {
            margin-left: 200px;
        }

        #vaciar, #alta {
            margin-left: 10px;
        }

        #header, #footer {
            width: 100%;
            height: 10%;
            display: flex;
            align-items: center;
            font-size: 20px;
            background-color: lightblue;
        }

        #tabla {
            margin-top:0px;
            width: 100%;
            height: 80%;
            overflow:auto;
        }

        table {
            width: 100%;
            border-collapse:collapse;
        }

        tbody tr:nth-child(odd) {
            background: rgba(0,.5,0,.2);
        }

        tbody tr {
            background-color: lightgray;
        }
        /*thead tr {
            background-color: lightgray;
        }*/
        tbody{
            margin-left:20px;
            
        }

        /*td, th{
            width:167px;
            border-style: solid;*/
            /*border-collapse:collapse;*/
        /*}*/
        td {
            text-align: center;
            width: 11.11vw;
            height: 50px;
            border: solid;
        }

        th {
            text-align: center;
            background-color: lightgray;
            height: 30px;
            width: 11.11vw;
            border: solid;
        }
        /*tr {
            height: 50px;
            width: 100%;
        }*/

        /*thead {
            position: fixed;
            width: 100%;
        }*/
        

        /*thead {
            margin-top: 0%;
            
        }*/

        tfoot {
            margin-bottom: 0%;
            margin-top: 520px;
        }

        #titulo {
            margin-right: 100px;
        }
        /*#filtroCodigo, #filtroDescripcion, #filtroFamilia, #filtroFechaAlta, #filtroUm, #filtroStock{
            
        }*/

        .sinEsconder {
            visibility: visible;
        }

        .escondido {
            visibility: hidden;
        }

        .bloq {
            pointer-events: none;
            opacity: 0.3;
        }

        .noBloq {
            pointer-events: auto;
            opacity: 1;
        }

        /*.cabecera {
            width: 168.5px;
            height: 50px;
            float: left;
            border: solid;
            background-color: lightgray;
            font-size: 17px;
            display: flex;
            justify-content: center;
            align-items: center;
        }*/

        .botonEspecial {
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #afueraModi, #afueraAlta, #afueraRespuesta {
            width: 50%;
            height: 72%;
            /*border-style: solid;*/
            border-radius: 20px;
            background-color: lightgreen;
            padding: 2%;
            position: fixed;
            margin-top: 8%;
            margin-left: 25%;
        }

        #headerModi, #headerAlta, #headerRespuesta {
            width: 96%;
            height: 12%;
            margin-bottom: 3%;
            border-radius: 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: grey;
            padding-right: 3%;
        }
        #enviarModi, #enviarAlta {
            width: 25%;
        }
        #cerrarModi, #cerrarAlta, #cerrarRespuesta {
            height: 80%;
            font-size: 25px;
            color: red;
        }

        #formularioModi, #formularioAlta {
            height: 70%;
            display: flex;
            flex-direction: column;
        }

            #formularioModi input, #formularioAlta input, select {
                width: 50%;
            }

        #general {
            height: 100%;
            width: 100%;
        }
        span{
            margin-right:200px;
            font-size:20px;
        }

        /*.filtro {
            width: 168.5px;
            height: 30px;
            border: solid;
            display:flex;
            float: left;
            margin-left: 0px;
        }*/
        /*.filtros{
            display:flex;
            
        }*/

        @media (max-width:1370px) {
            

            #cargar, #orden, #titulo {
                margin-left: 10px;
            }

            #titulo {
                margin-right: 10px;
            }
        }

        @media (max-width:1200px) {
            [campo-dato='fechaAlta'] {
                display: none;
            }

            td {
                width: 20vw;
            }

            th {
                width: 20vw;
            }
            #cargar, #orden, #titulo {
                margin-left: 10px;
            }
            #titulo{
                margin-right:10px;
            }
        }

        @media (max-width:900px) {
            [campo-dato='pdf'] {
                display: none;
            }

            td {
                width: 25vw;
            }

            th {
                width: 25vw;
            }

            #cargar, #orden, #titulo {
                margin-left: 10px;
            }
            #titulo {
                margin-right: 10px;
            }
        }

        @media (max-width:700px) {
            [campo-dato='um'] {
                display: none;
            }

            td {
                width: 33vw;
            }

            th {
                width: 33vw;
            }

            #cargar, #orden, #titulo {
                margin-left: 10px;
            }
            #titulo {
                font-size: 20px;
                margin-right: 10px;
            }
        }

        @media (max-width:500px) {
            [campo-dato='familia'] {
                display: none;
            }

            td {
                width: 50vw;
            }

            th {
                width: 50vw;
            }

            #cargar, #orden, #titulo {
                margin-left: 10px;
            }
            #titulo {
                margin-right: 10px;
                font-size:20px;
            }
        }
    </style>
</head>

<body>
    <!--FORMULARIO MODIFICACION-->
    <div id="afueraModi" class="sinEsconder">
        <div id="headerModi">
            <span>Modificación de Articulo</span>
            <button id="cerrarModi">X</button>
        </div>
        <div id="cuerpoModi">
            <div id="formularioModi">
                <label for="codArtModi">CodArt:</label>
                <input id="codArtModi" name="codArtModi1" type="text" readonly required />

                <label for="familiaModi">Familia:</label>
                <select id="familiaModi" name="familiaModi1" required>
                </select>

                <label for="umModi">Unidad de Medida:</label>
                <input id="umModi" name="umModi1" type="text" required />

                <label for="descripcionModi">Descripcion:</label>
                <input id="descripcionModi" name="descripcionModi1" type="text" required />

                <label for="fechaAltaModi">Fecha de Alta:</label>
                <input id="fechaAltaModi" name="fechaAltaModi1" type="date" required />

                <label for="saldoStockModi">Saldo Stock:</label>
                <input id="saldoStockModi" name="saldoStockModi1" type="number" required />

                <button id="enviarModi">Enviar</button>

            </div>

        </div>
    </div>

    <!--FORMULARIO DE ALTA-->
    <div id="afueraAlta" class="sinEsconder">
        <div id="headerAlta">
            <span>Alta de Articulo</span>
            <button id="cerrarAlta">X</button>
        </div>
        <div id="cuerpoAlta">
            <div id="formularioAlta">
                <label for="codArtAlta">CodArt:</label>
                <input id="codArtAlta" name="codArtAlta" type="text" maxlength="4" required />

                <label for="familiaAlta">Familia:</label>
                <select id="familiaAlta" name="familiaAlta" required>
                </select>
                <label for="umAlta">Unidad de Medida:</label>
                <input id="umAlta" name="umAlta" type="text" required />

                <label for="descripcionAlta">Descripcion:</label>
                <input id="descripcionAlta" name="descripcionAlta" type="text" required />

                <label for="fechaAltaAlta">Fecha de Alta:</label>
                <input id="fechaAltaAlta" name="fechaAltaAlta" type="date" required />

                <label for="saldoStockAlta">Saldo Stock:</label>
                <input id="saldoStockAlta" name="saldoStockAlta" type="number" required />

                <button id="enviarAlta">Enviar</button>

            </div>

        </div>
    </div>

    <!--RESPUESTA DEL SERVIDOR-->
    <div id="afueraRespuesta" class="sinEsconder">
        <div id="headerRespuesta">
            <span>Respuesta del Servidor</span>
            <button id="cerrarRespuesta">X</button>
        </div>
        <div id="cuerpoRespuesta">
            <div id="respuestaServer">


            </div>

        </div>
    </div>
    <!--acá arranca la tabla-->

    <div id="general">
        <div id="header">
            <h2 id="titulo">Articulos</h2>
            Orden:
            <input type="text" id="orden" readonly />
            <button id="cargar">Cargar Datos</button>
            <button id="vaciar">Vaciar Datos</button>
            <button id="alta">Alta Registro</button>
        </div>

        

        <div id="tabla">
            <table>
                <thead>
                    <tr id="filtros">
                        <th class="filtro" campo-dato='codArt'>
                            <input id="filtroCodigo" type="text" placeholder="Filtro codArt" />
                        </th>
                        <th class="filtro" campo-dato='familia'>
                            <input id="filtroFamilia" type="text" placeholder="Filtro Familia" />
                        </th>
                        <th class="filtro" campo-dato='um'>
                            <input id="filtroUm" type="text" placeholder="Filtro U.M." />
                        </th>
                        <th class="filtro" campo-dato='descripcion'>
                            <input id="filtroDescripcion" type="text" placeholder="Filtro Descripci&oacute;n"/>
                        </th>
                        <th class="filtro" campo-dato='fechaAlta'>
                            <input id="filtroFechaAlta" type="text" placeholder="Filtro Fecha" />
                        </th>
                        <th class="filtro" campo-dato='saldoStock'>
                            <input id="filtroStock" type="text" placeholder="Filtro Stock" />
                        </th>
                    </tr>

                    <tr id="cabeceras">

                        <th id="codArt" class="cabecera" style="cursor:pointer" campo-dato='codArt'>
                            Cod.Art.
                        </th>
                        <th id="familia" class="cabecera" style="cursor:pointer" campo-dato='familia'>
                            Familia
                        </th>
                        <th id="um" class="cabecera" style="cursor:pointer" campo-dato='um'>
                            U.M.
                        </th>
                        <th id="descripcion" class="cabecera" style="cursor:pointer" campo-dato='descripcion'>
                            Descripci&oacute;n
                        </th>
                        <th id="fechaAlta" class="cabecera" style="cursor:pointer" campo-dato='fechaAlta'>
                            Fecha Alta
                        </th>
                        <th id="saldoStock" class="cabecera" style="cursor:pointer" campo-dato='saldoStock'>
                            Stock
                        </th>
                        <th id="pdf" class="cabecera" campo-dato='pdf'>
                            PDF
                        </th>
                        <th id="modi" class="cabecera" campo-dato='modi'>
                            Modi
                        </th>
                        <th id="baja" class="cabecera" campo-dato='borrar'>
                            Baja
                        </th>

                    </tr>
                </thead>

                <tbody id="bod">
                </tbody>
            </table>
        </div>

        <div id="footer">
            <h6 id="totalRegistros"></h6>
            <h2 id="pie">Pie</h2>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            //OBJETOS DEL DOM TRANSFORMADOS A VARIABLE
            var tabla = $("#general");
            var formularioModi = $("#afueraModi");
            var formularioAlta = $("#afueraAlta");
            var respuestaServer = $("#afueraRespuesta");
            var btnEnviarModi = $("#enviarModi");
            var btnEnviarAlta = $("#enviarAlta");
            var txtCodArtModi = $("#codArtModi");   //MODI
            var txtFamiliaModi = $("#familiaModi");
            var txtUmModi = $("#umModi");
            var txtDescripcionModi = $("#descripcionModi");
            var txtFechaAltaModi = $("#fechaAltaModi");
            var txtSaldoStockModi = $("#saldoStockModi");
            var pdfModi = $("#archivoModi");
            var txtCodArtAlta = $("#codArtAlta");   //ALTA
            var txtFamiliaAlta = $("#familiaAlta");
            var txtUmAlta = $("#umAlta");
            var txtDescripcionAlta = $("#descripcionAlta");
            var txtFechaAltaAlta = $("#fechaAltaAlta");
            var txtSaldoStockAlta = $("#saldoStockAlta");
            var pdfAlta = $("#archivoAlta");

            //INICIALIZACION DE LOS COMPONENTES DEL DOM
            formularioModi.css("visibility", "hidden");
            formularioAlta.css("visibility", "hidden");
            respuestaServer.css("visibility", "hidden");

            //btnEnviarModi.attr("disabled", true);
            btnEnviarAlta.attr("disabled", true);

            tabla.addClass("noBloq");

            //BOTONES
            $("#codArtModi").keyup(function () { //KEYUPS DE MODI
                ValidarModi();
            });
            $("#familiaModi").keyup(function () {
                ValidarModi();
            });
            $("#descripcionModi").keyup(function () {
                ValidarModi();
            });
            $("#umModi").keyup(function () {
                ValidarModi();
            });
            $("#fechaAltaModi").keyup(function () {
                ValidarModi();
            });
            $("#saldoStockModi").keyup(function () {
                ValidarModi();
            });

            $("#codArtAlta").keyup(function () { //KEYUPS DE ALTA
                ValidarAlta();
            });
            $("#familiaAlta").keyup(function () {
                ValidarAlta();
            });
            $("#descripcionAlta").keyup(function () {
                ValidarAlta();
            });
            $("#umAlta").keyup(function () {
                ValidarAlta();
            });
            $("#fechaAltaAlta").keyup(function () {
                ValidarAlta();
            });
            $("#saldoStockAlta").keyup(function () {
                ValidarAlta();
            });



            btnEnviarModi.click(function () {   //ENVIO DE MODI
                Modificar();
            });

            btnEnviarAlta.click(function () {   //ENVIO DE ALTA
                Alta();
            });

            $("#vaciar").click(function () {    //BOTON VACIAR DATOS
                $("#bod").empty();
                $("#totalRegistros").empty();
                $("#orden").val("");
                $("#filtroCodigo").val("");
                $("#filtroFamilia").val("");
                $("#filtroUm").val("");
                $("#filtroDescripcion").val("");
                $("#filtroFechaAlta").val("");
                $("#filtroStock").val("");
            });

            $("#cargar").click(function () {    //BOTON CARGAR DATOS
                if ($("#filtroCodigo").val() == "" && $("#filtroFamilia").val() == "" && $("#filtroUm").val() == "" && $("#filtroDescripcion").val() == "" && $("#filtroFechaAlta").val() == "" && $("#filtroStock").val() == "") {
                    cargaTabla();
                } else {
                    cargaTablaOrdenadaYFiltrada();
                }

            });

            $("#alta").click(function () {  //BOTON ALTA REGISTRO
                tabla.removeClass("noBloq");
                tabla.addClass("bloq");
                $("#afueraAlta").addClass("noBloq");
                $("#afueraAlta").css("opacity", 1);
                formularioAlta.css("visibility", "visible");
                VaciarFormularioAlta();
                LlenarFamiliasAlta();
            });

            // CLICK EN HEADERS

            $("#codArt").click(function () {
                $("#orden").val("codArt");
                cargaTablaOrdenada();
            });

            $("#familia").click(function () {
                $("#orden").val("familia");

                cargaTablaOrdenada();
            });

            $("#um").click(function () {
                $("#orden").val("um");
                cargaTablaOrdenada();
            });

            $("#descripcion").click(function () {
                $("#orden").val("descripcion");
                cargaTablaOrdenada();
            });

            $("#fechaAlta").click(function () {
                $("#orden").val("fechaAlta");
                cargaTablaOrdenada();
            });

            $("#saldoStock").click(function () {
                $("#orden").val("saldoStock");
                cargaTablaOrdenada();
            });

            $("#cerrarModi").click(function () {
                tabla.removeClass("bloq");
                tabla.addClass("noBloq");
                formularioModi.css("visibility", "hidden");
            });

            $("#cerrarAlta").click(function () {
                tabla.removeClass("bloq");
                tabla.addClass("noBloq");
                formularioAlta.css("visibility", "hidden");
            });

            $("#cerrarRespuesta").click(function () {
                $("#respuestaServer").empty();
                tabla.removeClass("bloq");
                tabla.addClass("noBloq");
                respuestaServer.css("visibility", "hidden");
            });

            //FUNCIONES DE INTERACCION CON LA TABLA
            function CompletaFormModi(argArticulo) {    //COMPLETA FORMULARIO DE MODIFICACION
                txtCodArtModi.val(argArticulo);
                var objAjax = $.ajax({
                    type: "POST",
                    url: "./salidaConsulta.php",
                    data: { codArt: argArticulo, ID: "completaFormModi" },
                    success: function (respuestaDelServer, estado) {
                        objetoDato = JSON.parse(respuestaDelServer);

                        txtDescripcionModi.val(objetoDato.descripcion);
                        txtFamiliaModi.val(objetoDato.familia);
                        txtFechaAltaModi.val(objetoDato.fechaAlta);
                        txtSaldoStockModi.val(objetoDato.saldoStock);
                        txtUmModi.val(objetoDato.um);
                        //pdfModi.val(objetoDato.pdf); //NUEVO

                    } //cierra el success
                }); //cierro ajax
            }

            function LlenarFamiliasModi() { //LLENA COMBO BOX DEL MODI
                var objAjax = $.ajax({
                    type: "POST",
                    url: "./salidaConsulta.php",
                    data: { ID: "llenaLista" },
                    success: function (respuestaDelServer, estado) {
                        objetoDato = JSON.parse(respuestaDelServer);
                        //alert(objetoDato.familias[1].nombreFamilia);
                        txtFamiliaModi.empty();
                        objetoDato.familias.forEach(function (argValor, argIndice) {
                            //alert(argValor.nombreFamilia);
                            txtFamiliaModi.append("<option>" + argValor.nombreFamilia + "</option>");
                        });
                    } //cierra el success
                }); //cierro ajax
            }

            function LlenarFamiliasAlta() { //LLENA COMBO BOX DEL ALTA
                var objAjax = $.ajax({
                    type: "POST",
                    url: "./salidaConsulta.php",
                    data: { ID: "llenaLista" },
                    success: function (respuestaDelServer, estado) {
                        objetoDato = JSON.parse(respuestaDelServer);
                        //alert(objetoDato.familias[1].nombreFamilia);
                        txtFamiliaAlta.empty();
                        objetoDato.familias.forEach(function (argValor, argIndice) {
                            //alert(argValor.nombreFamilia);
                            txtFamiliaAlta.append("<option>" + argValor.nombreFamilia + "</option>");
                        });
                    } //cierra el success
                }); //cierro ajax
            }

            function VaciarFormularioAlta() { //VACIA EL FORMULARIO DE ALTA
                txtCodArtAlta.val("");
                txtDescripcionAlta.val("");
                txtFechaAltaAlta.val("");
                txtSaldoStockAlta.val("");
                txtUmAlta.val("");
            }

            function ValidarModi() {    //VALIDACION DE MODIFICACION
                if (document.getElementById("codArtModi").checkValidity() &&
                    document.getElementById("descripcionModi").checkValidity() &&
                    document.getElementById("familiaModi").checkValidity() &&
                    document.getElementById("fechaAltaModi").checkValidity() &&
                    document.getElementById("umModi").checkValidity() &&
                    document.getElementById("saldoStockModi").checkValidity()) {
                    //alert("ifModi");
                    $("#enviarModi").prop("disabled", false);
                }
                else {
                    //alert("elseModi");
                    $("#enviarModi").prop("disabled", true);
                }
            }

            function ValidarAlta() {    //VALIDACION DE ALTA
                if (document.getElementById("codArtAlta").checkValidity() &&
                    document.getElementById("descripcionAlta").checkValidity() &&
                    document.getElementById("familiaAlta").checkValidity() &&
                    document.getElementById("fechaAltaAlta").checkValidity() &&
                    document.getElementById("umAlta").checkValidity() &&
                    document.getElementById("saldoStockAlta").checkValidity()) {
                    //alert("ifAlta");
                    $("#enviarAlta").prop("disabled", false);
                }
                else {
                    //alert("elseAlta");
                    $("#enviarAlta").prop("disabled", true);
                }
            }

            function Modificar() {      // FUNCION DE MODIFICACION DE ARTICULO
                var objAjax = $.ajax({
                    type: "POST",
                    url: "salidaConsulta.php",
                    data: {
                        ID: "modificar",
                        codArt: txtCodArtModi.val(),
                        familia: txtFamiliaModi.val(),
                        um: txtUmModi.val(),
                        descripcion: txtDescripcionModi.val(),
                        fechaAlta: txtFechaAltaModi.val(),
                        saldoStock: txtSaldoStockModi.val(),
                    },
                    success: function (respuestaDelServer, estado) {
                        formularioModi.css("visibility", "hidden");
                        respuestaServer.css("visibility", "visible");
                        $("#respuestaServer").empty();
                        $("#respuestaServer").append("<h1>" + respuestaDelServer + "</h1>");
                        cargaTabla();
                    }//cierra funcion asignada al success
                }); //cierra objeto de parametros y funcion ajax
            }

            function Alta() {
                var objAjax = $.ajax({
                    type: "POST",
                    url: "salidaConsulta.php",
                    data: {
                        ID: "alta",
                        codArt: txtCodArtAlta.val(),
                        familia: txtFamiliaAlta.val(),
                        um: txtUmAlta.val(),
                        descripcion: txtDescripcionAlta.val(),
                        fechaAlta: txtFechaAltaAlta.val(),
                        saldoStock: txtSaldoStockAlta.val(),
                    },
                    success: function (respuestaDelServer, estado) {
                        //alert("SUCESS ALTA");
                        formularioAlta.css("visibility", "hidden");
                        respuestaServer.css("visibility", "visible");
                        $("#respuestaServer").empty();
                        $("#respuestaServer").append("<h1>" + respuestaDelServer + "</h1>");
                        cargaTabla();
                    }//cierra funcion asignada al success
                }); //cierra objeto de parametros y funcion ajax
            }


            function Baja(codigoABajar) {   //FUNCION PARA LA BAJA
                var objAjax = $.ajax({
                    type: "POST",
                    url: "salidaConsulta.php",
                    data: {
                        ID: "baja",
                        codArt: codigoABajar,
                    },
                    success: function (respuestaDelServer, estado) {
                        tabla.removeClass("noBloq");
                        tabla.addClass("bloq");
                        respuestaServer.css("visibility", "visible");
                        $("#respuestaServer").empty();
                        $("#respuestaServer").append("<h1>" + respuestaDelServer + "</h1>");
                        cargaTabla();
                    }//cierra funcion asignada al success
                }); //cierra objeto de parametros y funcion ajax
            }

            function cargaTablaOrdenadaYFiltrada() {    //CARGA TABLA ORDENADA Y FILTRADA

                $("#bod").empty();
                $("#bod").html("<p>Eserando respuesta ..</p>");
                var objAjax = $.ajax({
                    type: "POST",
                    url: "salidaConsulta.php",
                    data: {
                        ID: "ordenaryfiltrar",
                        orden: $("#orden").val(),
                        filtroCodigo: $("#filtroCodigo").val(),
                        filtroFamilia: $("#filtroFamilia").val(),
                        filtroUm: $("#filtroUm").val(),
                        filtroDescripcion: $("#filtroDescripcion").val(),
                        filtroFechaAlta: $("#filtroFechaAlta").val(),
                        filtroStock: $("#filtroStock").val(),
                    },
                    success: function (respuestaDelServer, estado) {
                        //$("#bod").append(" " + respuestaDelServer + "...AAAA");

                        $("#bod").empty();
                        //alert("sucess");

                        rtaJson = respuestaDelServer;
                        var objJson = JSON.parse(rtaJson);
                        //$("#bod").html(objJson["articulos"][1]["codArt"]);
                        var objTbDatos = $("#bod");
                        //$("#bod").append(" " + respuestaDelServer + "...AAAA");
                        //objTbDatos.append(objJson.articulos[1].familia + "<br/>" + objJson.articulos[1].codArt);
                        //objTbDatos.html(objJson["articulos"][1]["familia"]);
                        objJson.articulos.forEach(function (argValor, argIndice) {

                            var objTr = document.createElement("tr");

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "codArt");
                            objTd.innerHTML = argValor.codArt;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "familia");
                            objTd.innerHTML = argValor.familia;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "um");
                            objTd.innerHTML = argValor.um;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "descripcion");
                            objTd.innerHTML = argValor.descripcion;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "fechaAlta");
                            objTd.innerHTML = argValor.fechaAlta;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "saldoStock");
                            objTd.innerHTML = argValor.saldoStock;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "pdf");
                            objTd.innerHTML = "<button class='botonEspecial'>PDF</button>";
                            objTd.onclick = function () {
                                tabla.removeClass("noBloq");
                                tabla.addClass("bloq");
                                respuestaServer.css("visibility", "visible");
                                TraerPdf(argValor.codArt);
                            };
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "modi");
                            objTd.innerHTML = "<button class='botonEspecial'>Modi</button>";
                            objTd.onclick = function () {
                                tabla.removeClass("noBloq");
                                tabla.addClass("bloq");
                                formularioModi.css("visibility", "visible");
                                LlenarFamiliasModi();
                                CompletaFormModi(argValor.codArt);
                            };
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "borrar");
                            objTd.innerHTML = "<button class='botonEspecial'>Baja</button>";
                            objTd.onclick = function () {
                                if (confirm("Está seguro de borrar el articulo " + argValor.codArt + "?")) {
                                    Baja(argValor.codArt);
                                }

                            };
                            objTr.appendChild(objTd);

                            objTbDatos.append(objTr);
                        });//cierra el forEach
                        //$("#bod").append(" " + respuestaDelServer + "...AAAA");
                        $("#totalRegistros").html("Nro de registros: " + (objJson.articulos.length));
                        //$("#footer").html(" " + respuestaDelServer + "...AAAA");
                    }//cierra funcion asignada al success
                }); //cierra objeto de parametros y funcion ajax
            }

            function cargaTablaOrdenada() { // FUNCION CARGA TABLA ORDENADA

                $("#bod").empty();
                $("#bod").html("<p>Eserando respuesta ..</p>");
                var objAjax = $.ajax({
                    type: "POST",
                    url: "salidaConsulta.php",
                    data: {
                        ID: "ordenar",
                        orden: $("#orden").val(),
                    },
                    success: function (respuestaDelServer, estado) {
                        $("#bod").empty();
                        //alert("sucess");
                        //$("#bod").append(" " + respuestaDelServer + "...AAAA");
                        objJson = JSON.parse(respuestaDelServer);
                        //$("#bod").append(objJson.articulos[1].codArt);
                        var objTbDatos = $("#bod");

                        //objTbDatos.html(objJson["articulos"][1]["familia"]);
                        objJson.articulos.forEach(function (argValor, argIndice) {
                            var objTr = document.createElement("tr");

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "codArt");
                            objTd.innerHTML = argValor.codArt;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "familia");
                            objTd.innerHTML = argValor.familia;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "um");
                            objTd.innerHTML = argValor.um;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "descripcion");
                            objTd.innerHTML = argValor.descripcion;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "fechaAlta");
                            objTd.innerHTML = argValor.fechaAlta;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "saldoStock");
                            objTd.innerHTML = argValor.saldoStock;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "pdf");
                            objTd.innerHTML = "<button class='botonEspecial'>PDF</button>";
                            objTd.onclick = function () {
                                tabla.removeClass("noBloq");
                                tabla.addClass("bloq");
                                respuestaServer.css("visibility", "visible");
                                TraerPdf(argValor.codArt);
                            };
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "modi");
                            objTd.innerHTML = "<button class='botonEspecial'>Modi</button>";
                            objTd.onclick = function () {
                                tabla.removeClass("noBloq");
                                tabla.addClass("bloq");
                                formularioModi.css("visibility", "visible");
                                LlenarFamiliasModi();
                                CompletaFormModi(argValor.codArt);
                            };
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "borrar");
                            objTd.innerHTML = "<button class='botonEspecial'>Baja</button>";
                            objTd.onclick = function () {
                                if (confirm("Está seguro de borrar el articulo " + argValor.codArt + "?")) {
                                    Baja(argValor.codArt);
                                }

                            };
                            objTr.appendChild(objTd);

                            objTbDatos.append(objTr);
                        });//cierra el forEach
                        $("#totalRegistros").html("Nro de registros: " + (objJson.articulos.length));
                        //$("#footer").html(" " + respuestaDelServer + "...AAAA");
                    }//cierra funcion asignada al success
                }); //cierra objeto de parametros y funcion ajax
            }

            function cargaTabla() { //FUNCION CARGA TABLA

                $("#bod").empty();
                $("#bod").html("<p>Eserando respuesta ..</p>");
                var objAjax = $.ajax({
                    type: "POST",
                    url: "salidaConsulta.php",
                    data: {
                        ID: "cargar",
                    },
                    success: function (respuestaDelServer, estado) {
                        $("#bod").empty();
                        //alert("sucess");
                        //$("#bod").html(" " + respuestaDelServer + "...AAAA");
                        objJson = JSON.parse(respuestaDelServer);
                        //$("#bod").html(objJson["articulos"][1]["codArt"]);
                        var objTbDatos = $("#bod");

                        //objTbDatos.html(objJson["articulos"][1]["familia"]);
                        objJson.articulos.forEach(function (argValor, argIndice) {
                            var objTr = document.createElement("tr");

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "codArt");
                            objTd.innerHTML = argValor.codArt;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "familia");
                            objTd.innerHTML = argValor.familia;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "um");
                            objTd.innerHTML = argValor.um;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "descripcion");
                            objTd.innerHTML = argValor.descripcion;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "fechaAlta");
                            objTd.innerHTML = argValor.fechaAlta;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "saldoStock");
                            objTd.innerHTML = argValor.saldoStock;
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "pdf");
                            objTd.innerHTML = "<button class='botonEspecial'>PDF</button>";
                            objTd.onclick = function () {
                                tabla.removeClass("noBloq");
                                tabla.addClass("bloq");
                                respuestaServer.css("visibility", "visible");
                                TraerPdf(argValor.codArt);
                            };
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "modi");
                            objTd.innerHTML = "<button class='botonEspecial'>Modi</button>";
                            objTd.onclick = function () {
                                tabla.removeClass("noBloq");
                                tabla.addClass("bloq");
                                formularioModi.css("visibility", "visible");
                                LlenarFamiliasModi();
                                CompletaFormModi(argValor.codArt);
                            };
                            objTr.appendChild(objTd);

                            var objTd = document.createElement("td");
                            objTd.setAttribute("campo-dato", "borrar");
                            objTd.innerHTML = "<button class='botonEspecial'>Borrar</button>";
                            objTd.onclick = function () {
                                if (confirm("Está seguro de borrar el articulo " + argValor.codArt + "?")) {
                                    Baja(argValor.codArt);
                                }

                            };
                            objTr.appendChild(objTd);

                            objTbDatos.append(objTr);
                        });//cierra el forEach
                        $("#totalRegistros").html("Nro de registros: " + (objJson.articulos.length));
                        //$("#footer").html(" " + respuestaDelServer + "...AAAA");
                    }//cierra funcion asignada al success
                }); //cierra objeto de parametros y funcion ajax
            }

        });
    </script>

</body>
</html>