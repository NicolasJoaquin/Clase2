<?php
	
session_start();

if(!isset($_SESSION['usuario'])) {
	header('location:./FormularioDeLogin.html');
	exit();	
}

header('location:./menu.php');


?>