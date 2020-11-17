<?php

function logouted() {
	if(isset($_SESSION)){
		
	unset($_SESSION['usuario']); 
	header("Location: login.php");
	}
}

?>
