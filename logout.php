<?php

function logouted() {
	if(isset($_SESSION)){
		
	unset($_SESSION['usuario'], $_SESSION['acesso'], $_SESSION['nome']); 
	header("Location: entrar.php");
	}
}