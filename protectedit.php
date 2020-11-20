<?php

function protectedit() {

	if(!isset($_SESSION)) {
		session_start();
	}

	if($_SESSION['usuario'] !== $_SESSION['identificador'] ) {
			header("Location: entrar.php");
	}
}