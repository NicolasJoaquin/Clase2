<?php
    sleep(1.5);
	$clave = $_POST["clave"];
    $claveMD5 = md5($clave);
    $claveSHA1 = sha1($clave);
    echo"<h2>Respuesta a Formulario Encriptado:</h2>";
    echo"Clave: " . $clave . "<br/>";
    echo"Clave Encriptada en MD5: " . $claveMD5 . "<br/>";
    echo"Clave Encriptada en SHA1: " . $claveSHA1 . "<br/>";
?>