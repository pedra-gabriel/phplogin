<?php

include("conexao/conexao.php");

$erro = "";
 
if(isset($_POST['login']) && strlen($_POST['login']) > 0){

	if(!isset($_SESSION)) {

	$_SESSION['login'] = $_POST['login'];
	$_SESSION['senha'] = md5($_POST['senha']);

	}

	$sql_code = "SELECT id, acesso, login FROM usuario WHERE login = '$_SESSION[login]' AND senha = '$_SESSION[senha]'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$dado = $sql_query->fetch_assoc();
	$total = $sql_query->num_rows;

	if($total == 0) {

		$erro = "login ou senha incorretos";

	} else {

		session_start();
		$_SESSION['usuario'] = $dado['id'];
		$_SESSION['acesso'] = $dado['acesso'];
		$_SESSION['nome'] = $dado['login'];
			
		echo "<script>alert('login efetuado com sucesso'); location.href='inicio.php';</script>";
	
	}
}	