<?php

if(!isset($_SESSION)){session_start();}

if ($_SESSION['registro']) {
	$segundos = time() - $_SESSION['registro'];	//registra o momento do login
}

if($segundos > 3600) {	//limita tempo de inatividade em 5min
	session_destroy();	//logout após isso
	header('Location: entrar.php');
} else {
	$_SESSION['registro'] = time();
}