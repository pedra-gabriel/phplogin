<?php

function logouted() {
	if(isset($_SESSION)){
		
	//session_destroy não pode ser usada pois sessao download precisa estar sempre aberta
	unset($_SESSION['usuario'], $_SESSION['nome'], $_SESSION['registro'], $_SESSION['acesso']); 
	header("Location: entrar.php");
	}
}