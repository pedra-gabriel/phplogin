<?php

function protectedit() {

	if(!isset($_SESSION)) {
		session_start();
	}

	if($_SESSION['usuario'] !== $_GET['usuario']) {
			header("Location: entrar.php");
	}
}