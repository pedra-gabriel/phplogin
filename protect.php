<?php

//arquivo que impede de entrar caso não logado

function protect() {

	if(!isset($_SESSION)) {
		session_start();
	}

	if(!isset($_SESSION['usuario']) || !is_numeric($_SESSION['usuario'])) {
			header("Location: entrar.php");
	}
}