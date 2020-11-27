<?php

function logouted() {
	if(isset($_SESSION)){
		
	session_destroy(); 
	header("Location: entrar.php");
	}
}    //session_destroy