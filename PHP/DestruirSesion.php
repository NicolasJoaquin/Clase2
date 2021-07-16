<?php
	session_start();

	if(!isset($_SESSION['usuario'])) {
		header('location:./FormularioDeLogin.html');
		exit();	
	}

	session_destroy();

	header('Location:./formularioDeLogin.html');

?>