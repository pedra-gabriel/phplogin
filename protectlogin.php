<?php

//impede de acessar pagina caso logado

function protectlogin() {

	session_start();

	if(isset($_SESSION['usuario'])) {
		header('Location: inicio.php');
	}
}