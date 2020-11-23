<?php

function protectedit() {

	if(!isset($_SESSION)) {
		session_start();
	}

	if($_SESSION['usuario'] !== $_GET['usuario'] || !isset($_SESSION['usuario'])) {
			header("Location: entrar.php");
	}
}