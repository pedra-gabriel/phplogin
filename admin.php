<?php

function admin() {

	if(!isset($_SESSION)) {
		session_start();
	}

	if(!isset($_SESSION['usuario']) || $_SESSION['acesso'] != 1 ) {
			header("Location: entrar.php");
	}
}