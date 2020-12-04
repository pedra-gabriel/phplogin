<?php

//arquivo que impede um usuário de editar outro usuário

function protectedit() {

	if(!isset($_SESSION)) {
		session_start();
	}

	if(base64_encode($_SESSION['usuario']) !== $_GET['usuario'] || !isset($_SESSION['usuario'])) {
			header("Location: entrar.php");
	}
}