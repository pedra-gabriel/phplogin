<?php 

include("conexao/conexao.php");

function protectlista() {

	if(!isset($_SESSION))
	session_start();

	if(!isset($_SESSION['usuario'])) {
		header("Location: entrar.php");
	}
}

//sessio nao numerica