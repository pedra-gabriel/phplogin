<?php

function logouted() {
	if(isset($_SESSION)){
		
	unset($_SESSION['usuario'], $_SESSION['acesso']); 
	header("Location: entrar.php");
	}
}