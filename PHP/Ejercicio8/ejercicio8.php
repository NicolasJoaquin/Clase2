<?php
	sleep(1.5);
	$user = $_POST["user"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $ape = $_POST["ape"];
    $fecha = $_POST["fecha"];
    $objetoDatos =  new stdclass;

    $objetoDatos->user = $user;
    $objetoDatos->pass = $pass;
    $objetoDatos->name = $name;
    $objetoDatos->ape = $ape;
    $objetoDatos->fecha = $fecha;

    $rta = json_encode($objetoDatos);

   
    echo"<h2>Variable JSON:</h2>";
    echo"<p>" . $rta . "</p>";
?>