<?php

include("conexao/conexao.php");

$erro = "";

if(isset($_POST['create'])) {

	$_SESSION['usuario'] = $_POST['create'];
	$_SESSION['senha'] = $_POST['senhas'];


	$sql_code = "INSERT INTO usuario (login, senha) VALUES ('$_SESSION[usuario]', '$_SESSION[senha]')";

	$confirma =  $mysqli->query($sql_code) or die ($mysqli->error);

	if($confirma) {
		unset($_SESSION['usuario'], $_SESSION['senha']);
		header("Location: entrar.php");
	} else {
		$erro = "Não foi possível conectar com banco de dados";
	}
}