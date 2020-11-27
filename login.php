<?php

require("conexao/conexao.php");

if(isset($_POST['login']) && strlen($_POST['login']) > 0){

	if(!isset($_SESSION)) {

	$var_login = mysqli_escape_string($mysqli, $_POST['login']);
	$var_senha = mysqli_escape_string($mysqli, md5($_POST['senha']));

	}

	$sql_code = "SELECT id, acesso, login FROM usuario WHERE login = '$var_login' AND senha = '$var_senha'";
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

		$_SESSION['registro'] = time();
			
		echo "<script>alert('login efetuado com sucesso'); location.href='inicio.php';</script>";
	
	}
}	